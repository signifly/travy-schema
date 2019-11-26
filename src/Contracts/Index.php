<?php

namespace Signifly\Travy\Schema\Contracts;

interface Index
{
    public function pageTitle(): string;

    public function hero(): array;

    public function tabs(): array;
}
