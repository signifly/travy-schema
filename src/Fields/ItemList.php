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
     * @param  bool $mapped
     * @return self
     */
    public function label(string $label, bool $mapped = true): self
    {
        return $this->setProp('items.label', $label, $mapped);
    }

    /**
     * Set the value prop.
     *
     * @param  string $value
     * @param  bool $mapped
     * @return self
     */
    public function value(string $value, bool $mapped = true): self
    {
        return $this->setProp('items.value', $value, $mapped);
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
