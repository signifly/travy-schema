<?php

namespace Signifly\Travy\Schema\Fields\Input;

use Signifly\Travy\Schema\Fields\Field;

class Textarea extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-textarea';

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        $this->withProps(['text' => $this->attribute]);
    }
}
