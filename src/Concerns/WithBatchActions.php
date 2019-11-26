<?php

namespace Signifly\Travy\Schema\Concerns;

use Signifly\Travy\Schema\Batch;

interface WithBatchActions
{
    public function batch(): Batch;
}
