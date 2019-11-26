<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\ReorderItems;
use Signifly\Travy\Schema\Tests\TestCase;

class ScopesTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = ReorderItems::make('Variants')
            ->scope('items', 'people')
            ->image('image_url')
            ->list([
                ['label' => 'SKU', 'value' => 'sku'],
                ['label' => 'Items', 'value' => 'items_count'],
            ])
            ->endpoint('some_url', function ($endpoint) {
                $endpoint->usingMethod('post')
                    ->payload(['type' => 'ReorderVariants']);
            });

        $expected = [
            'name' => 'Variants',
            'attribute' => 'variants',
            'fieldType' => [
                'id' => 'input-reorder-items',
                'props' => [
                    'items' => [
                        '@scope' => 'people',
                        'data' => 'variants',
                        'image' => 'image_url',
                        'list' => [
                            ['label' => 'SKU', 'value' => 'sku'],
                            ['label' => 'Items', 'value' => 'items_count'],
                        ],
                        'actions' => [],
                    ],
                    '_endpoint' => [
                        'url' => 'some_url',
                        'method' => 'post',
                        'payload' => [
                            'type' => 'ReorderVariants',
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
