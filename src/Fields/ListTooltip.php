<?php

namespace Signifly\Travy\Schema\Fields;

class ListTooltip extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'list-tooltip';

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
