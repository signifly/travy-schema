<?php

namespace Signifly\Travy\Schema;

use Illuminate\Contracts\Support\Arrayable;
use Signifly\Travy\Schema\Concerns\Instantiable;
use Signifly\Travy\Schema\Contracts\Condition;

class Background implements Arrayable, Condition, \JsonSerializable
{
    use Instantiable;

    /**
     * The background color.
     *
     * @var string
     */
    protected $color;

    /**
     * Determines if the background should be applied.
     *
     * @var array
     */
    protected $active;

    /**
     * Crete a new Background.
     *
     * @param string $color
     */
    public function __construct(string $color)
    {
        $this->color = $color;
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
     * Determine if the background should be applied.
     *
     * @param string $key
     * @param $value
     * @param string $operator
     * @return $this
     */
    public function active(string $key, $value, $operator = 'eq'): self
    {
        $this->active = compact('key', 'operator', 'value');

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return [
            'color' => $this->color,
            'active' => $this->active,
        ];
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
