<?php

namespace Signifly\Travy\Schema\Concerns;

use Signifly\Travy\Schema\Row;

interface WithRow
{
    public function row(): Row;
}
