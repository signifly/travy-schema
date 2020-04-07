<?php

namespace Signifly\Travy\Schema\Fields;

use Signifly\Travy\Schema\Concerns\HasEndpoint;

class Context extends Field
{
    use HasEndpoint;

    /** {@inheritdoc} */
    public $component = 'context';

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

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        if ($this->hasEndpoint()) {
            $this->setProp('endpoint', $this->getEndpoint(), false);
        }

        $this->setProp('key', $this->attribute);
    }
}
