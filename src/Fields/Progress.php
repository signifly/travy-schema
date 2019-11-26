<?php

namespace Signifly\Travy\Schema\Fields;

class Progress extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'progress';

    /**
     * Set the status prop (alias for status).
     *
     * @param  string $key
     * @param  bool $mapped
     * @return self
     */
    public function color(string $key, bool $mapped = true): self
    {
        return $this->status($key, $mapped);
    }

    /**
     * Set the status prop.
     *
     * @param  string $key
     * @param  bool $mapped
     * @return self
     */
    public function status(string $key, bool $mapped = true): self
    {
        return $this->setProp('status', $key, $mapped);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        $this->setProp('percentage', $this->attribute);
    }
}
