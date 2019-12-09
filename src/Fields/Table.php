<?php

namespace Signifly\Travy\Schema\Fields;

class Table extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'table';

    /**
     * Set the value prop.
     *
     * @param  array|string  $value
     * @return self
     */
    public function value($value, bool $mapped = true): self
    {
        return $this->setProp('value', $value, $mapped);
    }

    /**
     * Set the columns prop.
     *
     * @param  array  $fields
     * @return self
     */
    public function columns(array $fields): self
    {
        return $this->setProp('columns', $fields, false);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        if ($this->missingProp('value')) {
            $this->setProp('value', $this->attribute);
        }
    }
}
