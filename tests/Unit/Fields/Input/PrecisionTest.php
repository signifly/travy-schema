<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Fields\Input\Precision;

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
            'fieldType' => [
                'id' => 'input-precision',
                'props' => [
                    'value' => '{number}',
                    'precision' => 2,
                    'step' => 0.1,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_be_disabled()
    {
        $field = Precision::make('Number')
            ->precision(2)
            ->step(0.1)
            ->disabled();

        $this->assertSame(0, $field->defaultValue);

        $expected = [
            'name' => 'Number',
            'fieldType' => [
                'id' => 'input-precision',
                'props' => [
                    'value' => '{number}',
                    'precision' => 2,
                    'step' => 0.1,
                    'disabled' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
