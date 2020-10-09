<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Fields\Input\Toggle;

class ToggleTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Toggle::make('Visible');

        $this->assertFalse($field->defaultValue);

        $expected = [
            'name' => 'Visible',
            'fieldType' => [
                'id' => 'input-toggle',
                'props' => [
                    'value' => '{visible}',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_be_disabled()
    {
        $field = Toggle::make('Visible')
            ->disabled();

        $this->assertFalse($field->defaultValue);

        $expected = [
            'name' => 'Visible',
            'fieldType' => [
                'id' => 'input-toggle',
                'props' => [
                    'value' => '{visible}',
                    'disabled' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
