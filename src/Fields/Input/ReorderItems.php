<?php

namespace Signifly\Travy\Schema\Fields\Input;

use Signifly\Travy\Schema\Concerns\HasActions;
use Signifly\Travy\Schema\Concerns\HasEndpoint;
use Signifly\Travy\Schema\Fields\Field;

class ReorderItems extends Field
{
    use HasActions;
    use HasEndpoint;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-reorder-items';

    /**
     * The validation rules for props.
     *
     * @var array
     */
    protected $propsValidationRules = [
        'endpoint' => 'required',
        'items' => 'required|array',
    ];

    /**
     * Set the items.image prop.
     *
     * @param  string $key
     * @param  bool $mapped
     * @return self
     */
    public function image(string $key, bool $mapped = true): self
    {
        return $this->setProp('items.image', $key, $mapped);
    }

    /**
     * Set the items.list prop.
     *
     * @param  array<label, value>  $list
     * @param  bool $mapped
     * @return self
     */
    public function list(array $list, bool $mapped = true): self
    {
        return $this->setProp('items.list', $list, $mapped);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions()
    {
        $this->setProp('items.data', $this->attribute);
        $this->setProp('items.actions', $this->preparedActions());

        if ($this->hasEndpoint()) {
            $this->setProp('endpoint', $this->endpoint->toArray(), false);
        }
    }
}
