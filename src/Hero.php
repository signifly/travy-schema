<?php

namespace Signifly\Travy\Schema;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;
use Signifly\Travy\Schema\Concerns\Instantiable;

class Hero implements Arrayable, JsonSerializable
{
    use Instantiable;

    /** @var string */
    protected $title;

    /** @var string|null */
    protected $subtitle;

    /** @var array */
    protected $breadcrumbs = [];

    public function __construct(string $title, ?string $subtitle = null)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    public function addBreadcrumb(string $name, ?string $url = null): self
    {
        $this->breadcrumbs[] = compact('name', 'url');

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray()
    {
        return [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'breadcrumbs' => $this->breadcrumbs,
        ];
    }
}
