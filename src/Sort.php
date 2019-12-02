<?php

namespace Signifly\Travy\Schema;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;
use Signifly\Travy\Schema\Concerns\Instantiable;

class Sort implements Arrayable, JsonSerializable
{
    use Instantiable;

    /** @var string */
    protected $default;

    /** @var array */
    protected $items;

    /**
     * Create a new Sort instance.
     *
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * Add item to sorting.
     *
     * @param string       $label
     * @param string       $value
     * @param bool $manual
     */
    public function addItem(string $label, string $value, bool $manual = false): self
    {
        $this->items[] = compact('label', 'value', 'manual');

        return $this;
    }

    /**
     * Set the default sorting value.
     *
     * @param  string $value
     * @return self
     */
    public function default(string $value): self
    {
        $this->default = $value;

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray()
    {
        $data = [
            'items' => $this->items,
        ];

        if ($this->default) {
            $data['default'] = $this->default;
        }

        return $data;
    }
}
