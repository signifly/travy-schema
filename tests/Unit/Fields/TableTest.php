<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Fields\Table;
use Signifly\Travy\Schema\Fields\Text;

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
            'fieldType' => [
                'id' => 'table',
                'props' => [
                    'columns' => [
                        [
                            'name' => 'Name',
                            'fieldType' => [
                                'id' => 'text',
                                'props' => [
                                    'text' => '{name}',
                                ],
                            ],
                        ],
                    ],
                    'value' => '{products}',
                ],
            ],
        ];
        $this->assertEquals($expected, $date->jsonSerialize());
    }
}
