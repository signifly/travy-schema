<?php

namespace Signifly\Travy\Schema\Concerns;

use Signifly\Travy\Schema\Contracts\Table;

interface WithActivity
{
    public function activity(): Table;
}
