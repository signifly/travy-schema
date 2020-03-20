<?php

namespace Signifly\Travy\Schema;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;
use Signifly\Travy\Schema\Concerns\Instantiable;
use Signifly\Travy\Schema\Contracts\Condition;

class Row implements Arrayable, JsonSerializable
{
    use Instantiable;

    /**
     * The conditions to apply to the row.
     *
     * @var Condition[]
     */
    protected $conditions;

    /**
     * Create a new Row instance.
     *
     * @param array $conditions
     */
    public function __construct(array $conditions = [])
    {
        $this->conditions = $conditions;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray()
    {
        return collect($this->conditions)
            ->mapWithKeys(function (Condition $condition) {
                return [$condition->name() => $condition->jsonSerialize()];
            })
            ->toArray();
    }
}
