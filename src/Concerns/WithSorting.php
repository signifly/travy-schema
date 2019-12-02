<?php

namespace Signifly\Travy\Schema\Concerns;

use Signifly\Travy\Schema\Sort;

interface WithSorting
{
    public function sort(): Sort;
}
