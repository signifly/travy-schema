<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Fields\Input\Textarea;

class TextareaTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Textarea::make('Content');

        $expected = [
            'name' => 'Content',
            'fieldType' => [
                'id' => 'input-textarea',
                'props' => [
                    'value' => '{content}',
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
            'fieldType' => [
                'id' => 'input-textarea',
                'props' => [
                    'value' => '{content}',
                    'disabled' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
