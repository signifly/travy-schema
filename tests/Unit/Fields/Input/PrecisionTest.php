<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\Precision;
use Signifly\Travy\Schema\Tests\TestCase;

class PrecisionTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Precision::make('Number')
            ->precision(2)
            ->step(0.1);

        $this->assertSame(0, $field->defaultValue);

        $expected = [
            'name' => 'Number',
            'attribute' => 'number',
            'fieldType' => [
                'id' => 'input-precision',
                'props' => [
                    'value' => 'number',
                    '_precision' => 2,
                    '_step' => 0.1,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
