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
     * Set the fallback prop.
     *
     * @param  mixed $text
     * @return self
     */
    public function fallback($text): self
    {
        return $this->setProp('fallback', $text);
    }

    /**
     * Set the subtitle prop.
     *
     * @param  string $subtitle
     * @return self
     */
    public function subtitle(string $subtitle): self
    {
        return $this->withProps(compact('subtitle'));
    }

    /**
     * Set the tooltip prop.
     *
     * @param  string $tooltip
     * @return self
     */
    public function tooltip(string $tooltip): self
    {
        return $this->withProps(compact('tooltip'));
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
