<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use Signifly\Travy\Schema\Fields\ListTooltip;
use Signifly\Travy\Schema\Tests\TestCase;

class ListTooltipTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = ListTooltip::make('Products')
            ->link('/products/{id}')
            ->label('name');

        $expected = [
            'name' => 'Products',
            'attribute' => 'products',
            'fieldType' => [
                'id' => 'list-tooltip',
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
