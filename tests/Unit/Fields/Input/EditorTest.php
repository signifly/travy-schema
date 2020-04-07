<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\Editor;
use PHPUnit\Framework\TestCase;

class EditorTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Editor::make('Description');

        $expected = [
            'name' => 'Description',
            'fieldType' => [
                'id' => 'input-editor-markdown',
                'props' => [
                    'content' => '{description}',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_be_disabled()
    {
        $field = Editor::make('Description')
            ->disabled();

        $expected = [
            'name' => 'Description',
            'fieldType' => [
                'id' => 'input-editor-markdown',
                'props' => [
                    'content' => '{description}',
                    'disabled' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
