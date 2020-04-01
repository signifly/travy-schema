<?php

namespace Signifly\Travy\Schema\Fields\Input;

use Signifly\Travy\Schema\Concerns\HasEndpoint;
use Signifly\Travy\Schema\Concerns\HasOptions;
use Signifly\Travy\Schema\Fields\Field;
use Signifly\Travy\Schema\Fields\Image;

class ImagePicker extends Image
{
    use HasEndpoint;
    use HasOptions;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-image-picker';

    /**
     * The default options for the element.
     *
     * @return array
     */
    public function defaultOptions(): array
    {
        return [
            'dataWrap' => 'data',
            'value' => 'id',
        ];
    }

    /**
     * Set the dataWrap option.
     *
     * @param  string $dataWrap
     * @return self
     */
    public function dataWrap(string $dataWrap): self
    {
        return $this->withOptions(compact('dataWrap'));
    }

    /**
     * Set the label option.
     *
     * @param  string $label
     * @return self
     */
    public function label(string $label): self
    {
        return $this->withOptions(compact('label'));
    }

    /**
     * Set the url option.
     *
     * @param  string $key
     * @return self
     */
    public function entityUrl(string $key): self
    {
        return $this->withOptions(['url' => $key]);
    }

    /**
     * Set the url prop.
     *
     * @param  string $key
     * @return self
     */
    public function url(string $key, bool $mapped = true): self
    {
        return $this
            ->withOptions(['url' => $key])
            ->setProp('url', $key, $mapped);
    }

    /**
     * Set the value option.
     *
     * @param  string $value
     * @return self
     */
    public function value(string $value): self
    {
        return $this->withOptions(compact('value'));
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        if ($this->hasEndpoint()) {
            $this->withOptions(['endpoint' => $this->endpoint->toArray()]);
        }

        $this->setProp('value', $this->attribute);
        $this->setProp('entities', $this->options(), false);
    }
}
