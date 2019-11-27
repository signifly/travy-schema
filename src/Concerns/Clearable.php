<?php

namespace Signifly\Travy\Schema\Concerns;

/**
 * @internal
 */
trait Clearable
{
    /**
     * Set the clearable prop.
     *
     * @param  bool $value
     * @param  bool $mapped
     * @return self
     */
    public function clearable(bool $value = true, bool $mapped = false): self
    {
        return $this->setProp('clearable', $value, $mapped);
    }
}
