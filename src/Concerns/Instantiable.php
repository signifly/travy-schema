<?php

namespace Signifly\Travy\Schema\Concerns;

/**
 * @internal
 */
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
