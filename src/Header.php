<?php

namespace Signifly\Travy\Schema;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;
use Signifly\Travy\Schema\Concerns\Instantiable;

/** @method static static make(string $url, string $name) */
class Header implements Arrayable, JsonSerializable
{
    use Instantiable;

    /** @var array */
    protected $link;

    /** @var array */
    protected $menu;

    /** @var bool */
    protected $notifications = false;

    public function __construct(array $menu)
    {
        $this->menu = $menu;
    }

    public function link(string $url, string $name): self
    {
        $this->link = compact('url', 'name');

        return $this;
    }

    public function enableNotifications(): self
    {
        $this->notifications = true;

        return $this;
    }

    public function toArray()
    {
        $schema = Schema::make([
            'menu' => $this->menu,
            'notifications' => $this->notifications,
        ]);

        if ($this->link) {
            $schema->set('link', $this->link);
        }

        return $schema->toArray();
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
