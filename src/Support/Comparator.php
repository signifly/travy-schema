<?php

namespace Signifly\Travy\Schema\Support;

use Illuminate\Contracts\Support\Arrayable;

class Comparator implements Arrayable, \JsonSerializable
{
    /** @var string */
    private $key;

    /** @var mixed */
    private $value;

    /** @var string */
    private $operator;

    /** @var bool */
    private $mapped;

    public function __construct(string $key, $value, string $operator = Operator::EQ, bool $mapped = true)
    {
        $this->key = $key;
        $this->value = $value;
        $this->operator = $operator;
        $this->mapped = $mapped;
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
        return [
            'key' => $this->mapped ? '{'.$this->key.'}' : $this->key,
            'operator' => $this->operator,
            'value' => $this->value,
        ];
    }
}
