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
     * Indicates if the field should be linkable.
     *
     * @var bool
     */
    public $linkable = true;

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
     * Use as input.
     *
     * @return self
     */
    public function asInput(): self
    {
        $this->component = 'input-text';

        return $this;
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
    public function tooltip(string $tooltip, bool $mapped = true): self
    {
        return $this->withProps(compact('tooltip'), $mapped);
    }

    /**
     * Set the type prop.
     *
     * @param  string $type
     * @param  bool $mapped
     * @return self
     */
    public function type(string $type, bool $mapped = false): self
    {
        return $this->withProps(compact('type'), $mapped);
    }

    /**
     * Set the unit prop.
     *
     * @param  string $unit
     * @return self
     */
    public function unit(string $unit, bool $mapped = false): self
    {
        return $this->withProps(compact('unit'), $mapped);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        if ($this->component == 'text') {
            $this->withProps(['text' => $this->attribute]);
            $this->forgetProp(['type', 'unit']);
        }

        if (in_array($this->component, ['input-text', 'input-number'])) {
            $this->withProps(['value' => $this->attribute]);
        }
    }
}
