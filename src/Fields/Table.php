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
     * Set the columnsData prop.
     *
     * @param  array|string  $data
     * @return self
     */
    public function data($data, bool $mapped = true): self
    {
        return $this->setProp('columnsData', $data, $mapped);
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
        if ($this->missingProp('columnsData')) {
            $this->setProp('columnsData', $this->attribute);
        }
    }
}
