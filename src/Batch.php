<?php

namespace Signifly\Travy\Schema;

use Illuminate\Support\Arr;
use JsonSerializable;
use Signifly\Travy\Schema\Concerns\HasActions;
use Signifly\Travy\Schema\Concerns\Instantiable;

class Batch implements JsonSerializable
{
    use HasActions;
    use Instantiable;

    /**
     * The attribute / column name for the label.
     *
     * @var string
     */
    public $attribute;

    /**
     * The link for the sequential tooltip.
     *
     * @var string
     */
    public $link;

    /**
     * The sequential url.
     *
     * @var string
     */
    public $sequential;

    /**
     * Create a new field.
     *
     * @param string $name
     * @param string|null $attribute
     */
    public function __construct($attribute, $link = null)
    {
        $this->attribute = $attribute;
        $this->link = $link;
    }

    /**
     * Set the link of the sequential tooltip.
     *
     * @param  string $link
     * @return self
     */
    public function link(string $link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Set the sequential url.
     *
     * @param  string $url
     * @return self
     */
    public function sequential(string $url)
    {
        $this->sequential = $url;

        return $this;
    }

    /**
     * Prepare the batch for JSON serialization.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        $data = [
            'selectedOptions' => [
                'label' => $this->attribute,
                'link' => $this->link,
            ],
            'sequential' => [
                'url' => $this->sequential ?? $this->link,
            ],
        ];

        if ($this->hasActions()) {
            Arr::set($data, 'bulk.actions', $this->preparedActions());
        }

        return $data;
    }
}
