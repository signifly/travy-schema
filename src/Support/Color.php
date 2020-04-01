<?php

namespace Signifly\Travy\Schema\Support;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;
use Signifly\Travy\Schema\Concerns\Instantiable;
use Signifly\Travy\Schema\Schema;

class Color implements Arrayable, JsonSerializable
{
    use Instantiable;

    /** @var string */
    protected $color;

    /** @var Comparator */
    protected $show;

    /**
     * Color constructor.
     *
     * @param string $color
     */
    public function __construct(string $color)
    {
        $this->color = $color;
    }

    public function show(string $key, $value, string $operator = Operator::EQ): self
    {
        $this->show = new Comparator(...func_get_args());

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return Schema::make([
            'color' => $this->color,
            'show' => $this->show,
        ])->toArray();
    }
}
