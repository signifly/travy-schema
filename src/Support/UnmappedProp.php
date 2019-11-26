<?php

namespace Signifly\Travy\Schema\Support;

class UnmappedProp
{
    protected $attribute;
    protected $value;

    public function __construct($value, $attribute = null)
    {
        $this->value = $value;
        $this->attribute = $attribute;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getAttribute()
    {
        return $this->attribute;
    }

    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;

        return $this;
    }
}
