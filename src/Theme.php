<?php

namespace Signifly\Travy\Schema;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;
use Signifly\Travy\Schema\Concerns\Instantiable;

class Theme implements Arrayable, JsonSerializable
{
    use Instantiable;

    /** @var string */
    protected $cover;

    /** @var string */
    protected $logo;

    /** @var string */
    protected $color;

    public function __construct(string $cover, string $logo, string $color)
    {
        $this->cover = $cover;
        $this->logo = $logo;
        $this->color = $color;
    }

    public function toArray()
    {
        return [
            'cover' => $this->cover,
            'logo' => $this->logo,
            'color' => $this->color,
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
