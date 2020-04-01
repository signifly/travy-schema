<?php

namespace Signifly\Travy\Schema\Fields;

class Dot extends Fields
{
    public $component = 'dot';

    /**
     * Set the icon prop.
     *
     * @param string $icon
     * @return $this
     */
    public function icon(string $icon): self
    {
        return $this->setProp('icon', $icon);
    }

    /**
     * Set the size prop.
     *
     * @param string $size
     * @return $this
     */
    public function size(string $size): self
    {
        return $this->setProp('size', $size);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions()
    {
        $this->setProp('color', $this->attribute);
    }
}
