<?php

namespace Signifly\Travy\Schema\Fields\Input;

use Signifly\Travy\Schema\Fields\Field;

class RadioGroup extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-radio-group';

    /**
     * Set the items.
     *
     * @param  array  $items
     * @param  bool $items
     * @return self
     */
    public function items(array $items, bool $mapped = false): self
    {
        return $this->setProp('items', $items, $mapped);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        $this->withProps(['value' => $this->attribute]);
    }
}
