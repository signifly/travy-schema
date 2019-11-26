<?php

namespace Signifly\Travy\Schema\Fields;

class ProgressSet extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'progress-set';

    /**
     * Set the status prop (alias for status).
     *
     * @param  string $key
     * @param  bool $mapped
     * @return self
     */
    public function color(string $key, bool $mapped = true): self
    {
        return $this->status($key, $mapped);
    }

    /**
     * Set the percentage prop.
     *
     * @param  string $percentage
     * @param  bool $mapped
     * @return self
     */
    public function percentage(string $percentage, bool $mapped = true): self
    {
        return $this->setProp('items.percentage', $percentage, $mapped);
    }

    /**
     * Set the status prop.
     *
     * @param  string $key
     * @param  bool $mapped
     * @return self
     */
    public function status(string $key, bool $mapped = true): self
    {
        return $this->setProp('items.status', $key, $mapped);
    }

    /**
     * Set the title prop.
     *
     * @param  string $title
     * @param  bool $mapped
     * @return self
     */
    public function title(string $title, bool $mapped = true): self
    {
        return $this->setProp('items.title', $title, $mapped);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        $this->scope('items', $this->attribute);
    }
}
