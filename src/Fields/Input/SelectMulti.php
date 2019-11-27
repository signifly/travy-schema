<?php

namespace Signifly\Travy\Schema\Fields\Input;

use Signifly\Travy\Schema\Concerns\Addable;
use Signifly\Travy\Schema\Fields\Field;

class SelectMulti extends Select
{
    use Addable;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-select-multi';

    /**
     * The default value for the field.
     *
     * @var mixed
     */
    public $defaultValue = [];
}
