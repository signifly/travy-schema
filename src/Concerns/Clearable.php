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
     * @return self
     */
    public function clearable(bool $value = true): self
    {
        return $this->setProp('clearable', $value);
    }
}
