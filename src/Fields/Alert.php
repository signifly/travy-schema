<?php

namespace Signifly\Travy\Schema\Fields;

class Alert extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'alert';

    /**
     * Set the text prop.
     *
     * @param $text
     * @param bool $mapped
     * @return self
     */
    public function text($text, bool $mapped = false): self
    {
        return $this->setProp('text', $text, $mapped);
    }

    /**
     * Set the icon prop.
     *
     * @param $icon
     * @param bool $mapped
     * @return self
     */
    public function icon($icon, bool $mapped = false): self
    {
        return $this->setProp('icon', $icon, $mapped);
    }

    /**
     * Set the status prop.
     *
     * @param $status
     * @param bool $mapped
     * @return self
     */
    public function status($status, bool $mapped = false): self
    {
        return $this->setProp('status', $status, $mapped);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        $this->setProp('title', $this->name, false);
        $this->name = null;
    }
}
