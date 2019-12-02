<?php

namespace Signifly\Travy\Schema\Contracts;

use Signifly\Travy\Schema\Endpoint;
use Signifly\Travy\Schema\Hero;

interface View
{
    public function pageTitle(): string;

    public function hero(): Hero;

    public function tabs(): array;

    public function endpoint(): Endpoint;
}
