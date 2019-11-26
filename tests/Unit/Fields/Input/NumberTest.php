<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\Number;
use Signifly\Travy\Schema\Tests\TestCase;

class NumberTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Number::make('Price');

        $this->assertSame(0, $field->defaultValue);

        $expected = [
            'name' => 'Price',
            'attribute' => 'price',
            'fieldType' => [
                'id' => 'input-number',
                'props' => [
                    'value' => 'price',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_sets_the_unit()
    {
        $field = Number::make('Price')
            ->unit('DKK');

        $this->assertSame(0, $field->defaultValue);

        $expected = [
            'name' => 'Price',
            'attribute' => 'price',
            'fieldType' => [
                'id' => 'input-number',
                'props' => [
                    'value' => 'price',
                    '_unit' => 'DKK',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
