<?php

namespace Signifly\Travy\Schema\Fields\Input;

use Signifly\Travy\Schema\Fields\Field;

class Dot extends Field
{
    /** {@inheritdoc} */
    public $component = 'input-dot';

    /**
     * Set the dot items.
     *
     * @param array|string $items <color, value>
     * @param bool $mapped
     * @return self
     */
    public function items($items, bool $mapped = false): self
    {
        return $this->setProp('items', $items, $mapped);
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
        return $this->setProp('size', $size, $mapped);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        $this->setProp('value', $this->attribute);
    }
}
