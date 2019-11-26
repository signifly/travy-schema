<?php

namespace Signifly\Travy\Concerns;

trait Instantiable
{
    /**
     * Create a new instance.
     *
     * @param  mixed $arguments
     * @return self
     */
    public static function make(...$arguments): self
    {
        return new static(...$arguments);
    }
}
