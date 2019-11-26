<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use Signifly\Travy\Schema\Fields\KeyValueBox;
use Signifly\Travy\Schema\Tests\TestCase;

class KeyValueBoxTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = KeyValueBox::make('Some title')
            ->addItem('Name', 'name')
            ->addItem('Items', 'items_count');

        $expected = [
            'name' => 'Some title',
            'attribute' => 'some_title',
            'fieldType' => [
                'id' => 'key-value-box',
                'props' => [
                    'items' => [
                        ['label' => 'Name', 'value' => 'name'],
                        ['label' => 'Items', 'value' => 'items_count'],
                    ],
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
