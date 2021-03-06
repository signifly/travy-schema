<?php

namespace Signifly\Travy\Schema\Fields;

class TimeSince extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'time-since';

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
