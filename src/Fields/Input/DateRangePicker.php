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
     * @param  bool $mapped
     * @return self
     */
    public function end(string $key, bool $mapped = true): self
    {
        return $this->setProp('dateEnd', $key, $mapped);
    }

    /**
     * Set the dateStart prop.
     *
     * @param  string $key
     * @param  bool $mapped
     * @return self
     */
    public function start(string $key, bool $mapped = true): self
    {
        return $this->setProp('dateStart', $key, $mapped);
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
