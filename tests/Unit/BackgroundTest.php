<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Background;
use Signifly\Travy\Schema\Support\Color;
use Signifly\Travy\Schema\Support\Operator;

class BackgroundTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $bg = Background::make([
            Color::make('red')->show('is_active', true),
        ]);

        $expected = [
            [
                'color' => 'red',
                'show' => ['key' => '{is_active}', 'value' => true, 'operator' => Operator::EQ],
            ],
        ];

        $this->assertEquals($expected, $bg->jsonSerialize());
    }
}
