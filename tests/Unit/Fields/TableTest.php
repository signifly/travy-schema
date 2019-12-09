<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use Signifly\Travy\Schema\Fields\Table;
use Signifly\Travy\Schema\Fields\Text;
use Signifly\Travy\Schema\Tests\TestCase;

class TableTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $date = Table::make('Products')
            ->columns([
                Text::make('Name'),
            ]);

        $expected = [
            'name' => 'Products',
            'attribute' => 'products',
            'fieldType' => [
                'id' => 'table',
                'props' => [
                    '_columns' => [
                        [
                            'name' => 'Name',
                            'attribute' => 'name',
                            'fieldType' => [
                                'id' => 'text',
                                'props' => [
                                    'text' => 'name',
                                ],
                            ],
                        ],
                    ],
                    'value' => 'products',
                ],
            ],
        ];
        $this->assertEquals($expected, $date->jsonSerialize());
    }
}
