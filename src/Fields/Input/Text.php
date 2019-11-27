<?php

namespace Signifly\Travy\Schema\Fields\Input;

use Signifly\Travy\Schema\Fields\Field;

class Text extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-text';

    /**
     * Set the type prop.
     *
     * @param  string $type
     * @param  bool $mapped
     * @return self
     */
    public function type(string $type, bool $mapped = false): self
    {
        return $this->withProps(compact('type'), $mapped);
    }

    /**
     * Set the unit prop.
     *
     * @param  string $unit
     * @return self
     */
    public function unit(string $unit, bool $mapped = false): self
    {
        return $this->withProps(compact('unit'), $mapped);
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
