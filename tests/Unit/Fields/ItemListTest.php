<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use Signifly\Travy\Schema\Fields\ItemList;
use PHPUnit\Framework\TestCase;

class ItemListTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = ItemList::make('Products')
            ->label('name')
            ->value('id');

        $expected = [
            'name' => 'Products',
            'fieldType' => [
                'id' => 'item-list',
                'props' => [
                    'items' => [
                        '@scope' => 'products',
                        'label' => '{name}',
                        'value' => '{id}',
                    ],
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
