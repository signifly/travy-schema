<?php

namespace Signifly\Travy\Schema\Concerns;

/**
 * @internal
 */
trait Addable
{
    /**
     * Set the addable prop.
     *
     * @param  bool|string $value
     * @return self
     */
    public function addable($value = true): self
    {
        return $this->setProp('addable', $value);
    }
}
