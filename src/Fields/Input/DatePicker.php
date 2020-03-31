<?php

namespace Signifly\Travy\Schema\Fields\Input;

use Signifly\Travy\Schema\Concerns\Clearable;
use Signifly\Travy\Schema\Fields\Field;

class DatePicker extends Field
{
    use Clearable;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-date';

    /**
     * Set the format prop.
     *
     * @param  string $value
     * @return self
     */
    public function format(string $value): self
    {
        return $this->withProps(['format' => $value]);
    }

    /**
     * Set the formatValue prop.
     *
     * @param  string $value
     * @return self
     */
    public function formatValue(string $value): self
    {
        return $this->withProps(['formatValue' => $value]);
    }

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
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        $this->withProps(['date' => $this->attribute]);
    }
}
