<?php

namespace Signifly\Travy\Schema\Tests\Support\View;

use Signifly\Travy\Schema\Endpoint;
use Signifly\Travy\Schema\Tab;
use Signifly\Travy\Schema\Tests\Support\Table\TestTable;
use Signifly\Travy\Schema\View;

class ShopView extends View
{
    public function pageTitle(): string
    {
        return 'Shop {name}';
    }

    public function hero(): array
    {
        return [
            'title' => '{name}',
            'subtitle' => 'Lorem ipsum bla bla bla bla',
        ];
    }

    public function tabs(): array
    {
        return [
            Tab::make('Details', new TestTable($this->request)),
        ];
    }

    public function endpoint(): Endpoint
    {
        return new Endpoint('some_url');
    }
}
