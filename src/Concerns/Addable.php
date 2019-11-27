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
     * @param  bool $value
     * @param  bool $mapped
     * @return self
     */
    public function addable($value = true, bool $mapped = false): self
    {
        return $this->setProp('addable', $value, $mapped);
    }
}
