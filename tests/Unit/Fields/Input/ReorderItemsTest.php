<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Exceptions\InvalidPropsException;
use Signifly\Travy\Schema\Fields\Input\ReorderItems;
use Signifly\Travy\Schema\Tests\TestCase;

class ReorderItemsTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = ReorderItems::make('Variants')
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

    /** @test */
    public function it_throws_if_endpoint_hasnt_been_set()
    {
        $this->expectException(InvalidPropsException::class);

        $field = ReorderItems::make('Variants')
            ->image('image_url');

        $field->jsonSerialize();
    }
}
