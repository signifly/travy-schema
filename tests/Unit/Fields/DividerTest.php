<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use Signifly\Travy\Schema\Fields\Divider;
use PHPUnit\Framework\TestCase;

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
