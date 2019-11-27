<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use Signifly\Travy\Schema\Fields\Text;
use Signifly\Travy\Schema\Tests\TestCase;

class TextTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Text::make('Name');

        $expected = [
            'name' => 'Name',
            'attribute' => 'name',
            'fieldType' => [
                'id' => 'text',
                'props' => [
                    'text' => 'name',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
