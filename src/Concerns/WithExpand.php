<?php

namespace Signifly\Travy\Schema\Concerns;

use Signifly\Travy\Schema\Expand;

interface WithExpand
{
    public function expand(): Expand;
}
