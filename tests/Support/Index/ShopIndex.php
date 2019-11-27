<?php

namespace Signifly\Travy\Schema\Tests\Support\Index;

use Signifly\Travy\Schema\Index;

class ShopIndex extends Index
{
    public function pageTitle(): string
    {
        return 'Shops';
    }

    public function hero(): array
    {
        return [
            'title' => 'Welcome back, {name}',
            'subtitle' => 'Lorem ipsum bla bla bla bla',
        ];
    }

    public function tabs(): array
    {
        return [];
    }
}
