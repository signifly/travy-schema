<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Fields\Divider;

class DividerTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Divider::make('Divider title');

        $expected = [
            'name' => null,
            'fieldType' => [
                'id' => 'divider',
                'props' => [
                    'text' => 'Divider title',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
