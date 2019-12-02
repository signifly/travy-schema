<?php

namespace Signifly\Travy\Schema;

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
        $schema = new Schema([
            'selectedOptions' => [
                'label' => $this->attribute,
            ],
        ]);

        if ($link = $this->link) {
            $schema->set('selectedOptions.link', $link);
        }

        if ($sequential = $this->sequential ?? $this->link) {
            $schema->set('sequential.url', $sequential);
        }

        if ($this->hasActions()) {
            $schema->set('bulk.actions', $this->preparedActions());
        }

        return $schema->toArray();
    }
}
