<?php

namespace Signifly\Travy\Schema\Fields;

class Text extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'text';

    /**
     * Set the align prop.
     *
     * @param  string $align
     * @param  bool $mapped
     * @return self
     */
    public function align(string $align, bool $mapped = false): self
    {
        return $this->withProps(compact('align'), $mapped);
    }

    /**
     * Set the bold prop.
     *
     * @param  bool $value
     * @param  bool $mapped
     * @return self
     */
    public function bold($value = true, bool $mapped = false): self
    {
        return $this->withProps(['bold' => $value], $mapped);
    }

    /**
     * Set the textDefault prop.
     *
     * @param  mixed $text
     * @return self
     */
    public function default($text): self
    {
        return $this->setProp('_fallback.text', $text);
    }

    /**
     * Set the status prop.
     *
     * @param  string $status
     * @return self
     */
    public function status(string $status, bool $mapped = true): self
    {
        return $this->withProps(compact('status'), $mapped);
    }

    /**
     * Set the subtitle prop.
     *
     * @param  string $subtitle
     * @param  bool $mapped
     * @return self
     */
    public function subtitle(string $subtitle, bool $mapped = true): self
    {
        return $this->withProps(compact('subtitle'), $mapped);
    }

    /**
     * Set the tooltip prop.
     *
     * @param  string $tooltip
     * @param  bool $mapped
     * @return self
     */
    public function iconTooltip(string $tooltip, bool $mapped = true): self
    {
        return $this->withProps(compact('tooltip'), $mapped);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        $this->setProp('text', $this->attribute);
    }
}
