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
     * @param  bool|string $value
     * @param  bool $mapped
     * @return self
     */
    public function clearable($value = true, bool $mapped = false): self
    {
        return $this->setProp('clearable', $value, $mapped);
    }
}
