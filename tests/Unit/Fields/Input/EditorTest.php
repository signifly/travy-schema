<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\Editor;
use Signifly\Travy\Schema\Tests\TestCase;

class EditorTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Editor::make('Description');

        $expected = [
            'name' => 'Description',
            'attribute' => 'description',
            'fieldType' => [
                'id' => 'input-editor-markdown',
                'props' => [
                    'content' => 'description',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
