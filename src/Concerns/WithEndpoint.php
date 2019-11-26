<?php

namespace Signifly\Travy\Schema\Concerns;

use Signifly\Travy\Schema\Endpoint;

interface WithEndpoint
{
    public function endpoint(): Endpoint;
}
