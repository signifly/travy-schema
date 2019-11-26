<?php

namespace Signifly\Travy\Schema\Fields\Input;

use Signifly\Travy\Schema\Fields\Field;

class Precision extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-precision';

    /**
     * The default value for the field.
     *
     * @var mixed
     */
    public $defaultValue = 0;

    /**
     * Set the max prop.
     *
     * @param  float  $value
     * @param  bool $mapped
     * @return self
     */
    public function max(float $value, bool $mapped = false): self
    {
        return $this->setProp('max', $value, $mapped);
    }

    /**
     * Set the precision prop.
     *
     * @param  int    $value
     * @param  bool $mapped
     * @return self
     */
    public function precision(int $value, bool $mapped = false): self
    {
        return $this->setProp('precision', $value, $mapped);
    }

    /**
     * Set the step prop.
     *
     * @param  float  $value
     * @param  bool $mapped
     * @return self
     */
    public function step(float $value, bool $mapped = false): self
    {
        return $this->setProp('step', $value, $mapped);
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
