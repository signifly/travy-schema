<?php

namespace Signifly\Travy\Schema\Tests\Support\Index;

use Signifly\Travy\Schema\Hero;
use Signifly\Travy\Schema\Index;

class ShopIndex extends Index
{
    public function pageTitle(): string
    {
        return 'Shops';
    }

    public function hero(): Hero
    {
        return Hero::make('Welcome back, {name}', 'Lorem ipsum bla bla bla bla');
    }

    public function tabs(): array
    {
        return [];
    }
}
