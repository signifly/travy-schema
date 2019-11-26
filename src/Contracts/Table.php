<?php

namespace Signifly\Travy\Schema\Contracts;

use Signifly\Travy\Schema\Endpoint;

interface Table
{
    public function columns(): array;

    public function endpoint(): Endpoint;
}
