<?php

namespace Signifly\Travy\Schema\Contracts;

use Signifly\Travy\Schema\Hero;

interface Index
{
    public function pageTitle(): string;

    public function hero(): Hero;

    public function tabs(): array;
}
