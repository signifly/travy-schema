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
     * @param  bool $mapped
     * @return self
     */
    public function format(string $value, bool $mapped = false): self
    {
        return $this->withProps(['format' => $value], $mapped);
    }

    /**
     * Set the formatValue prop.
     *
     * @param  string $value
     * @param  bool $mapped
     * @return self
     */
    public function formatValue(string $value, bool $mapped = false): self
    {
        return $this->withProps(['formatValue' => $value], $mapped);
    }

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
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        $this->withProps(['date' => $this->attribute]);
    }
}
