<?php

namespace Signifly\Travy\Schema\Fields;

class Image extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'image';

    /**
     * Set the fit prop.
     *
     * @param  string $fit It should be either `contain` or `cover`.
     * @param  bool $mapped
     * @return self
     */
    public function fit(string $fit, bool $mapped = false): self
    {
        return $this->withProps(compact('fit'), $mapped);
    }

    /**
     * Set the width and height props.
     *
     * @param  string $width
     * @param  string $height
     * @param  bool $mapped
     * @return self
     */
    public function size($width = '200px', $height = '200px', bool $mapped = false): self
    {
        return $this->withProps(compact('width', 'height'), $mapped);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        $this->withProps(['src' => $this->attribute]);
    }
}
