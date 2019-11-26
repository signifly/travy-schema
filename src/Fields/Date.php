<?php

namespace Signifly\Travy\Schema\Fields;

class Date extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'date';

    /**
     * Set the format prop.
     *
     * @param  string $format
     * @return self
     */
    public function format(string $format, bool $mapped = false): self
    {
        return $this->withProps(compact('format'), $mapped);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        $this->withProps(['timestamp' => $this->attribute]);
    }
}
