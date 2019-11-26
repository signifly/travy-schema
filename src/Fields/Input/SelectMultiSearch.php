<?php

namespace Signifly\Travy\Schema\Fields\Input;

use Signifly\Travy\Schema\Fields\Field;

class SelectMultiSearch extends SelectSearch
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-select-multi-search';

    /**
     * The default value for the field.
     *
     * @var mixed
     */
    public $defaultValue = [];
}
