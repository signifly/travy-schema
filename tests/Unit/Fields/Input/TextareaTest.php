<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\Textarea;
use Signifly\Travy\Schema\Tests\TestCase;

class TextareaTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Textarea::make('Content');

        $expected = [
            'name' => 'Content',
            'attribute' => 'content',
            'fieldType' => [
                'id' => 'input-textarea',
                'props' => [
                    'value' => 'content',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_be_disabled()
    {
        $field = Textarea::make('Content')
            ->disabled();

        $expected = [
            'name' => 'Content',
            'attribute' => 'content',
            'fieldType' => [
                'id' => 'input-textarea',
                'props' => [
                    'value' => 'content',
                    '_disabled' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
