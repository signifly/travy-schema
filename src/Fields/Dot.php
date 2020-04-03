<?php

namespace Signifly\Travy\Schema\Fields;

class Dot extends Field
{
    /** {@inheritdoc} */
    public $component = 'dot';

    /**
     * Set the color prop.
     *
     * @param string $color
     * @param bool $mapped
     * @return $this
     */
    public function color(string $color, bool $mapped = false): self
    {
        return $this->setProp('color', $color, $mapped);
    }

    /**
     * Set the icon prop.
     *
     * @param string $icon
     * @param bool $mapped
     * @return $this
     */
    public function icon(string $icon, bool $mapped = false): self
    {
        return $this->setProp('icon', $icon, $mapped);
    }

    /**
     * Set the size prop.
     *
     * @param string $size
     * @param bool $mapped
     * @return $this
     */
    public function size(string $size, bool $mapped = false): self
    {
        return $this->setProp('size', $size, false);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        if ($this->missingProp('color')) {
            $this->setProp('color', $this->attribute, false);
        }
    }
}
