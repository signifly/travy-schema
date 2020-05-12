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
     * Set the items.external prop.
     *
     * @param  bool $value
     * @param  bool $mapped
     * @return self
     */
    public function external(bool $value = true, bool $mapped = false): self
    {
        return $this->setProp('items.external', $value, $mapped);
    }

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
     * Set the link prop.
     *
     * @param  string $link
     * @param  bool $mapped
     * @return self
     */
    public function link(string $link, bool $mapped = false): self
    {
        return $this->setProp('items.link', $link, $mapped);
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
