<?php

namespace Signifly\Travy\Schema;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;
use Signifly\Travy\Schema\Concerns\Instantiable;
use Signifly\Travy\Schema\Contracts\Condition;

class Background implements Arrayable, Condition, JsonSerializable
{
    use Instantiable;

    /**
     * The background colors to show.
     *
     * @var array
     */
    protected $colors;

    public function __construct(array $colors)
    {
        $this->colors = $colors;
    }

    /**
     * The name of the condition.
     *
     * @return string
     */
    public function name(): string
    {
        return 'background';
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return Schema::make([
            'colors' => $this->colors,
        ])->toArray();
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
