<?php

namespace Signifly\Travy\Schema\Fields\Input;

use Signifly\Travy\Schema\Fields\Field;

class Number extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-number';

    /**
     * The default value for the field.
     *
     * @var mixed
     */
    public $defaultValue = 0;

    /**
     * Set the unit prop.
     *
     * @param  string $unit
     * @param  bool $mapped
     * @return self
     */
    public function unit(string $unit, bool $mapped = false): self
    {
        return $this->setProp('unit', $unit, $mapped);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        $this->withProps(['value' => $this->attribute]);
    }
}
