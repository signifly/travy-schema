<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Fields\Input\ColorPicker;

class ColorPickerTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = ColorPicker::make('Color Code');

        $expected = [
            'name' => 'Color Code',
            'fieldType' => [
                'id' => 'input-color-picker',
                'props' => [
                    'value' => '{color_code}',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_be_disabled()
    {
        $field = ColorPicker::make('Color Code')
            ->disabled();

        $expected = [
            'name' => 'Color Code',
            'fieldType' => [
                'id' => 'input-color-picker',
                'props' => [
                    'value' => '{color_code}',
                    'disabled' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
