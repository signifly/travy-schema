<?php

namespace Signifly\Travy\Schema\Fields;

class Fields extends Field
{
    /** {@inheritdoc}  */
    public $component = 'fields';

    /**
     * Set the fields prop.
     *
     * @param array $fields
     * @return self
     */
    public function fields(array $fields): self
    {
        return $this->setProp('fields', $fields);
    }
}
