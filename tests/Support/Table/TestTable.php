<?php

namespace Signifly\Travy\Schema\Tests\Support\Table;

use Signifly\Travy\Schema\Endpoint;
use Signifly\Travy\Schema\Fields\Text;
use Signifly\Travy\Schema\Table;

class TestTable extends Table
{
    public function columns(): array
    {
        return [
            Text::make('Title'),
        ];
    }

    public function endpoint(): Endpoint
    {
        return new Endpoint('some_url');
    }
}
