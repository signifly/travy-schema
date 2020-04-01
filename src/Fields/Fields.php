<?php

namespace Signifly\Travy\Schema\Fields;

class Fields extends Field
{
    /** {@inheritdoc}  */
    public $component = 'fields';

    public function fields(array $fields): self
    {
        return $this->setProp('fields', $fields);
    }
}
