<?php

namespace Signifly\Travy\Schema\Fields;

class Text extends Field
{
    /** {@inheritdoc} */
    public $component = 'text';

    /**
     * Enable copy text.
     *
     * @param bool $value
     * @param bool $mapped
     * @return self
     */
    public function copy($value = true, bool $mapped = false): self
    {
        return $this->setProp('copy', $value, $mapped);
    }

    /**
     * Set the textDefault prop.
     *
     * @param  mixed $text
     * @return self
     */
    public function fallback($text): self
    {
        return $this->setProp('fallback', $text, false);
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
     * Apply styling to the field.
     *
     * @param array $style
     * @return self
     */
    public function style(array $style): self
    {
        return $this->setProp('style', $style, false);
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
