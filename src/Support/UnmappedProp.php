<?php

namespace Signifly\Travy\Schema\Support;

class UnmappedProp
{
    /**
     * @var string|null
     */
    protected $attribute;

    /**
     * @var mixed
     */
    protected $value;

    /**
     * Create a new UnmappedProp instance.
     *
     * @param mixed $value
     * @param string|null $attribute
     */
    public function __construct($value, $attribute = null)
    {
        $this->value = $value;
        $this->attribute = $attribute;
    }

    /**
     * Get the value.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get the attribute.
     *
     * @return string|null
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * Set the attribute.
     *
     * @param string|null $attribute
     */
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;

        return $this;
    }
}
