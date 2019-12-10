<?php

namespace Signifly\Travy\Schema\Fields\Input;

use Signifly\Travy\Schema\Fields\Field;

class Password extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-password';

    /**
     * Set the autocomplete prop.
     *
     * @param  string       $autocomplete
     * @param  bool $mapped
     * @return self
     */
    public function autocomplete(string $autocomplete, bool $mapped = false): self
    {
        return $this->setProp('autocomplete', $autocomplete, $mapped);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        if ($this->missingProp('autocomplete')) {
            $this->autocomplete('new-password');
        }

        $this->withProps(['value' => $this->attribute]);
    }
}
