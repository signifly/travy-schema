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

    public function __construct(string $key, $value, string $operator = Operator::EQ)
    {
        $this->key = $key;
        $this->value = $value;
        $this->operator = $operator;
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
            'key' => '{'.$this->key.'}', // should always be mapped
            'operator' => $this->operator,
            'value' => $this->value,
        ];
    }
}
