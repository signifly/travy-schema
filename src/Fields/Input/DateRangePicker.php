<?php

namespace Signifly\Travy\Schema\Fields\Input;

class DateRangePicker extends DatePicker
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-date-range';

    /**
     * Set the dateEnd prop.
     *
     * @param  string $key
     * @return self
     */
    public function end(string $key): self
    {
        return $this->setProp('dateEnd', $key);
    }

    /**
     * Set the dateStart prop.
     *
     * @param  string $key
     * @return self
     */
    public function start(string $key): self
    {
        return $this->setProp('dateStart', $key);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
    }
}
