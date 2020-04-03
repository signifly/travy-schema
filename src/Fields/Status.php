<?php

namespace Signifly\Travy\Schema\Fields;

class Status extends Field
{
    const DANGER = 'danger';
    const DEFAULT = 'default';
    const INFO = 'info';
    const PRIMARY = 'primary';
    const WARNING = 'warning';

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'status';

    /**
     * Set the status prop (alias for status).
     *
     * @param  string $color
     * @return self
     */
    public function color(string $color, bool $mapped = false): self
    {
        return $this->setProp('color', $color, $mapped);
    }

    /**
     * Set the status prop.
     *
     * @param  string $key
     * @return self
     */
    public function status(string $key, bool $mapped = true): self
    {
        return $this->setProp('status', $key, $mapped);
    }

    /**
     * @param string $text
     * @param bool $mapped
     * @return $this
     */
    public function text(string $text, bool $mapped = true): self
    {
        return $this->setProp('text', $text, $mapped);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        if ($this->missingProp('text')) {
            $this->withProps(['text' => $this->attribute]);
        }
    }
}
