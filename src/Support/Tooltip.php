<?php

namespace Signifly\Travy\Schema\Support;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;
use Signifly\Travy\Schema\Concerns\Instantiable;
use Signifly\Travy\Schema\Schema;

/** @method static static make(string $text) */
class Tooltip implements Arrayable, JsonSerializable
{
    use Instantiable;

    /** @var string */
    protected $text;

    /** @var Comparator */
    protected $show;

    /**
     * Color constructor.
     *
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * Determine when to show the tooltip.
     *
     * @param string $key
     * @param $value
     * @param string $operator
     * @return $this
     */
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
            'text' => $this->text,
            'show' => $this->show,
        ])->toArray();
    }
}
