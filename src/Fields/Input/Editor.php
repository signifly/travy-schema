<?php

namespace Signifly\Travy\Schema\Fields\Input;

use Signifly\Travy\Schema\Fields\Field;

class Editor extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-editor-markdown';

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        $this->withProps(['content' => $this->attribute]);
    }
}
