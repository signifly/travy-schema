<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use Signifly\Travy\Schema\Background;
use Signifly\Travy\Schema\Link;
use Signifly\Travy\Schema\Row;
use Signifly\Travy\Schema\Tests\TestCase;

class RowTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $action = Row::make([
            Background::make('#fff')->active('is_disabled', true),
        ]);

        $expected = [
            'background' => [
                'color' => '#fff',
                'active' => [
                    'key' => 'is_disabled',
                    'operator' => 'eq',
                    'value' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $action->jsonSerialize());
    }
}
