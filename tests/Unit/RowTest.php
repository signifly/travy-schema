<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use Signifly\Travy\Schema\Background;
use Signifly\Travy\Schema\Row;
use Signifly\Travy\Schema\Support\Color;
use Signifly\Travy\Schema\Support\Operator;
use Signifly\Travy\Schema\Tests\TestCase;

class RowTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $action = Row::make([
            Background::make([
                Color::make('red')->show('is_active', true),
            ]),
        ]);

        $expected = [
            'background' => [
                [
                    'color' => 'red',
                    'show' => ['key' => '{is_active}', 'value' => true, 'operator' => Operator::EQ],
                ],
            ],
        ];
        $this->assertEquals($expected, $action->jsonSerialize());
    }
}
