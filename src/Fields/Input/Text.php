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
     * @return self
     */
    public function type(string $type): self
    {
        return $this->withProps(compact('type'));
    }

    /**
     * Set the unit prop.
     *
     * @param  string $unit
     * @return self
     */
    public function unit(string $unit): self
    {
        return $this->withProps(compact('unit'));
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
