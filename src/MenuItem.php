<?php

namespace Signifly\Travy\Schema;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;
use Signifly\Travy\Schema\Concerns\Instantiable;

class MenuItem implements Arrayable, JsonSerializable
{
    use Instantiable;

    /**
     * The name of the menu item.
     *
     * @var string
     */
    protected $name;

    /**
     * The url of the menu item.
     *
     * @var string
     */
    protected $url;

    /**
     * The items that are children of this menu item.
     *
     * @var array
     */
    protected $items = [];

    public function __construct(string $name, ?string $url = null)
    {
        $this->name = $name;
        $this->url = $url;
    }

    /**
     * Set the items.
     *
     * @param  array  $items
     * @return self
     */
    public function items(array $items)
    {
        $this->items = $items;

        return $this;
    }

    public function toArray()
    {
        $schema = new Schema([
            'name' => $this->name,
            'url' => $this->url,
        ]);

        if (count($this->items) > 0) {
            $schema->set('items', $this->items);
            $schema->forget('url');
        }

        return $schema->toArray();
    }

    public function JsonSerialize()
    {
        return $this->toArray();
    }
}
