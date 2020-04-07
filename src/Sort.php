<?php

namespace Signifly\Travy\Schema;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;
use Signifly\Travy\Schema\Concerns\Instantiable;

/** @method static static make(array $items = []) */
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

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray()
    {
        $items = collect($this->items);

        $data = [
            'items' => $items->jsonSerialize(),
        ];

        if ($default = $items->filter->isDefault()->first()) {
            $data['default'] = $default->value();
        }

        return $data;
    }
}
