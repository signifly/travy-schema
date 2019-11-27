<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\Text;
use Signifly\Travy\Schema\Tests\TestCase;

class TextTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Text::make('Content');

        $expected = [
            'name' => 'Content',
            'attribute' => 'content',
            'fieldType' => [
                'id' => 'input-text',
                'props' => [
                    'value' => 'content',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_allows_setting_an_input_type()
    {
        $field = Text::make('Email')
            ->type('email');

        $expected = [
            'name' => 'Email',
            'attribute' => 'email',
            'fieldType' => [
                'id' => 'input-text',
                'props' => [
                    'value' => 'email',
                    '_type' => 'email',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_allows_setting_a_unit_prop()
    {
        $field = Text::make('Height')
            ->unit('cm');

        $expected = [
            'name' => 'Height',
            'attribute' => 'height',
            'fieldType' => [
                'id' => 'input-text',
                'props' => [
                    'value' => 'height',
                    '_unit' => 'cm',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_be_disabled()
    {
        $field = Text::make('Content')
            ->disabled();

        $expected = [
            'name' => 'Content',
            'attribute' => 'content',
            'fieldType' => [
                'id' => 'input-text',
                'props' => [
                    'value' => 'content',
                    '_disabled' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
