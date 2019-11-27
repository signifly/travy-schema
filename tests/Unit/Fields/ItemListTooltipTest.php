<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use Signifly\Travy\Schema\Fields\ItemListTooltip;
use Signifly\Travy\Schema\Tests\TestCase;

class ItemListTooltipTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = ItemListTooltip::make('Products')
            ->link('/products/{id}')
            ->label('name');

        $expected = [
            'name' => 'Products',
            'attribute' => 'products',
            'fieldType' => [
                'id' => 'item-list-tooltip',
                'props' => [
                    'items' => [
                        '@scope' => 'products',
                        '_link' => '/products/{id}',
                        'label' => 'name',
                    ],
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
