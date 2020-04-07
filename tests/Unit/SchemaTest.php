<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use Signifly\Travy\Schema\Fields\Text;
use Signifly\Travy\Schema\Schema;
use PHPUnit\Framework\TestCase;

class SchemaTest extends TestCase
{
    /** @test */
    public function it_serializes_attributes_to_json()
    {
        $schema = new Schema([
            'name' => 'name',
            'field' => Text::make('Test'),
            'items' => [
                Text::make('Name'),
            ],
            'nested' => [
                'nested' => [
                    Text::make('Other'),
                ],
                'item' => Text::make('Something'),
            ],
        ]);

        $expected = [
            'name' => 'name',
            'field' => [
                'name' => 'Test',
                'fieldType' => [
                    'id' => 'text',
                    'props' => [
                        'text' => '{test}',
                    ],
                ],
            ],
            'items' => [
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
            'nested' => [
                'nested' => [
                    [
                        'name' => 'Other',
                        'fieldType' => [
                            'id' => 'text',
                            'props' => [
                                'text' => '{other}',
                            ],
                        ],
                    ],
                ],
                'item' => [
                    'name' => 'Something',
                    'fieldType' => [
                        'id' => 'text',
                        'props' => [
                            'text' => '{something}',
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($expected, $schema->jsonSerialize());
    }
}
