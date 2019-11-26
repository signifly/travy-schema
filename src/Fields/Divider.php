<?php

namespace Signifly\Travy\Schema\Fields;

class Divider extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'divider';

    /**
     * Create a new field.
     *
     * @param string $name
     * @param string|null $attribute
     */
    public function __construct($name, $attribute = null)
    {
        $this->name = null;
        $this->setAttribute($name, $attribute);
        $this->text($name);
    }

    /**
     * Set the text prop.
     *
     * @param  string $text
     * @return self
     */
    public function text(string $text, bool $mapped = false): self
    {
        return $this->setProp('text', $text, $mapped);
    }
}
