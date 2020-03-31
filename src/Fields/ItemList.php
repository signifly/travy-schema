<?php

namespace Signifly\Travy\Schema\Fields;

class ItemList extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'item-list';

    /**
     * Set the label prop.
     *
     * @param  string $label
     *
     * @return self
     */
    public function label(string $label): self
    {
        return $this->setProp('items.label', $label);
    }

    /**
     * Set the value prop.
     *
     * @param  string $value
     *
     * @return self
     */
    public function value(string $value): self
    {
        return $this->setProp('items.value', $value);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        $this->scope('items', $this->attribute);
    }
}
