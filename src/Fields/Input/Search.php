<?php

namespace Signifly\Travy\Schema\Fields\Input;

use Signifly\Travy\Schema\Concerns\HasOptions;
use Signifly\Travy\Schema\Fields\Field;

class Search extends Field
{
    use HasOptions;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-search';

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        $this->withProps([
            'value' => $this->attribute,
            'options' => $this->options(),
        ]);
    }
}
