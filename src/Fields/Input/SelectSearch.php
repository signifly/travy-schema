<?php

namespace Signifly\Travy\Schema\Fields\Input;

use Signifly\Travy\Schema\Concerns\Addable;
use Signifly\Travy\Schema\Concerns\Clearable;
use Signifly\Travy\Schema\Concerns\HasEndpoint;
use Signifly\Travy\Schema\Concerns\HasOptions;
use Signifly\Travy\Schema\Fields\Field;

class SelectSearch extends Field
{
    use Addable;
    use Clearable;
    use HasEndpoint;
    use HasOptions;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-select-search';

    /**
     * The default options for the element.
     *
     * @return array
     */
    public function defaultOptions(): array
    {
        return [
            'dataWrap' => 'data',
            'itemKey' => 'data',
            'value' => 'id',
        ];
    }

    /**
     * Set the itemKey option.
     *
     * @param  string $itemKey
     * @return self
     */
    public function itemKey(string $itemKey): self
    {
        return $this->withOptions(compact('itemKey'));
    }

    /**
     * Set the dataWrap option.
     *
     * @param  string $dataWrap
     * @return self
     */
    public function dataWrap(string $dataWrap): self
    {
        return $this->withOptions(compact('dataWrap'));
    }

    /**
     * Set the label option.
     *
     * @param  string $label
     * @return self
     */
    public function label(string $label): self
    {
        return $this->withOptions(compact('label'));
    }

    /**
     * Set the value option.
     *
     * @param  string $value
     * @return self
     */
    public function value(string $value): self
    {
        return $this->withOptions(compact('value'));
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        if ($this->hasEndpoint()) {
            $this->withOptions(['endpoint' => $this->endpoint->toArray()]);
        }

        $this->setProp('value', $this->attribute);
        $this->setProp('entities', $this->options(), false);
    }
}
