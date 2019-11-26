<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\ReorderMini;
use Signifly\Travy\Schema\Tests\TestCase;

class ReorderMiniTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = ReorderMini::make('Variants', 'ids')
            ->columns([
                ['key' => 'id', 'label' => 'ID'],
                ['key' => 'name', 'label' => 'Name'],
            ])
            ->endpoint('some_url')
            ->key('data')
            ->value('id');

        $expected = [
            'name' => 'Variants',
            'attribute' => 'ids',
            'fieldType' => [
                'id' => 'input-reorder-mini',
                'props' => [
                    'prop' => 'ids',
                    'columns' => [
                        ['key' => 'id', 'label' => 'ID'],
                        ['key' => 'name', 'label' => 'Name'],
                    ],
                    'options' => [
                        'key' => 'data',
                        'value' => 'id',
                        '_endpoint' => [
                            'url' => 'some_url',
                        ],
                    ],
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
