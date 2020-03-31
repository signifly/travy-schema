<?php

namespace Signifly\Travy\Schema\Fields;

use Illuminate\Support\Str;
use JsonSerializable;
use Signifly\Travy\Schema\Concerns\HasMetaData;
use Signifly\Travy\Schema\Concerns\HasProps;
use Signifly\Travy\Schema\Concerns\HasScopes;
use Signifly\Travy\Schema\Concerns\Instantiable;
use Signifly\Travy\Schema\Schema;
use Signifly\Travy\Schema\Support\AttributeResolver;
use Signifly\Travy\Schema\Support\PropsResolver;
use Signifly\Travy\Schema\Support\ScopesApplier;

abstract class Field implements JsonSerializable
{
    use HasProps;
    use HasScopes;
    use HasMetaData;
    use Instantiable;

    const SINGLE_ATTRIBUTE_REGEX = '/^{[^{]+}$/g';

    /**
     * The field's component.
     *
     * @var string
     */
    public $component;

    /**
     * The displayable name.
     *
     * @var string
     */
    public $name;

    /**
     * The attribute / column name.
     *
     * @var string
     */
    public $attribute;

    /**
     * The attribute to use for errors.
     *
     * @var string|null
     */
    public $errorAttribute;

    /**
     * The default value for the field.
     *
     * @var mixed
     */
    public $defaultValue = null;

    /**
     * Create a new field.
     *
     * @param string $name
     * @param string|null $attribute
     */
    public function __construct($name, $attribute = null)
    {
        $this->name = $name;
        $this->setAttribute($name, $attribute);
    }

    /**
     * Set the attribute for the field.
     *
     * @param string $name
     * @param string|null $attribute
     */
    protected function setAttribute($name, $attribute = null): void
    {
        $this->attribute = $attribute ?? '{'.str_replace([' '], '_', Str::lower($name)).'}';
    }

    /**
     * Create a field without a name.
     *
     * @param  string $attribute
     * @return static
     */
    public static function attr($attribute)
    {
        return static::make(null, $attribute);
    }

    /**
     * Set the Vue component name.
     *
     * @param  string $component
     * @return self
     */
    public function component(string $component): self
    {
        $this->component = $component;

        return $this;
    }

    /**
     * Check if what component the field is.
     *
     * @param  string  $component
     * @return bool
     */
    public function is(string $component): bool
    {
        return $this->component == $component;
    }

    /**
     * Hide action on given constraint.
     *
     * @param  string $key
     * @param  mixed $value
     * @param  string $operator
     * @return self
     */
    public function hide(string $key, $value, string $operator = 'eq'): self
    {
        return $this->withMeta(['hide' => compact('key', 'operator', 'value')]);
    }

    /**
     * Specify that this field should be disabled.
     *
     * @param  bool  $value
     * @return self
     */
    public function disabled($value = true): self
    {
        return $this->setProp('disabled', $value);
    }

    /**
     * Specify the url the field should link to.
     *
     * @param  string $url
     * @return self
     */
    public function onClick(string $url): self
    {
        return $this->withMeta(['onClick' => $url]);
    }

    /**
     * Set the default value.
     *
     * @param  mixed $value
     * @return self
     */
    public function defaultValue($value): self
    {
        $this->defaultValue = $value;

        return $this;
    }

    /**
     * Specify the field description.
     *
     * @param  string $text
     * @return self
     */
    public function description(string $text): self
    {
        return $this->withMeta(['description' => $text]);
    }

    /**
     * Specify a hint.
     *
     * @param string $hint
     * @return $this
     */
    public function hint(string $hint): self
    {
        return $this->withMeta(compact('hint'));
    }

    /**
     * Set the sublabel of the column.
     *
     * @param  string $text
     * @return self
     */
    public function sublabel(string $text): self
    {
        return $this->withMeta(['sublabel' => $text]);
    }

    /**
     * Specify the field width.
     *
     * @param  int    $value
     * @return self
     */
    public function width(int $value): self
    {
        return $this->withMeta(['width' => $value]);
    }

    /**
     * The field type.
     *
     * @return array
     */
    public function fieldType(): array
    {
        $props = $this->props();

        $this->guardAgainstInvalidProps($props);

        return Schema::make([
            'id' => $this->component,
            'props' => $this->transformProps($props),
        ])->toArray();
    }

    /**
     * Prepare the field for JSON serialization.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        if (method_exists($this, 'applyOptions')) {
            $this->applyOptions();
        }

        return array_merge([
            'name' => $this->name,
            'attribute' => $this->errorAttribute ?? str_replace(['{', '}'], '', $this->attribute),
            'fieldType' => $this->fieldType(),
        ], $this->meta());
    }

    /**
     * Transform the props.
     *
     * @param  array  $props
     * @return array
     */
    protected function transformProps(array $props): array
    {
        return (new ScopesApplier())->apply($props, $this->scopes());
    }
}
