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
                    'value' => '{price}',
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
                    'value' => '{price}',
                    'unit' => 'DKK',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_be_disabled()
    {
        $field = Number::make('Price')
            ->disabled();

        $this->assertSame(0, $field->defaultValue);

        $expected = [
            'name' => 'Price',
            'attribute' => 'price',
            'fieldType' => [
                'id' => 'input-number',
                'props' => [
                    'value' => '{price}',
                    'disabled' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
