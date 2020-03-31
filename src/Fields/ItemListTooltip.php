<?php

namespace Signifly\Travy\Schema\Fields;

class ItemListTooltip extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'item-list-tooltip';

    /**
     * Set the label prop.
     *
     * @param  string $label
     * @return self
     */
    public function label(string $label): self
    {
        return $this->setProp('items.label', $label);
    }

    /**
     * Set the link prop.
     *
     * @param  string $link
     * @return self
     */
    public function link(string $link): self
    {
        return $this->setProp('items.link', $link);
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
