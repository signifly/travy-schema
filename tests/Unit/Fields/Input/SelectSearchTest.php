<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\SelectSearch;
use Signifly\Travy\Schema\Tests\TestCase;

class SelectSearchTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = SelectSearch::make('Currencies')
            ->endpoint('some_url')
            ->label('name')
            ->value('id');

        $expected = [
            'name' => 'Currencies',
            'attribute' => 'currencies',
            'fieldType' => [
                'id' => 'input-select-search',
                'props' => [
                    'value' => 'currencies',
                    '_entities' => [
                        'endpoint' => [
                            'url' => 'some_url',
                        ],
                        'label' => 'name',
                        'value' => 'id',
                        'dataWrap' => 'data',
                    ],
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_is_clearable()
    {
        $field = SelectSearch::make('Currencies')
            ->endpoint('some_url')
            ->label('name')
            ->value('id')
            ->clearable();

        $expected = [
            'name' => 'Currencies',
            'attribute' => 'currencies',
            'fieldType' => [
                'id' => 'input-select-search',
                'props' => [
                    'value' => 'currencies',
                    '_entities' => [
                        'endpoint' => [
                            'url' => 'some_url',
                        ],
                        'label' => 'name',
                        'value' => 'id',
                        'dataWrap' => 'data',
                    ],
                    '_clearable' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_is_addable()
    {
        $field = SelectSearch::make('Currencies')
            ->endpoint('some_url')
            ->label('name')
            ->value('id')
            ->addable();

        $expected = [
            'name' => 'Currencies',
            'attribute' => 'currencies',
            'fieldType' => [
                'id' => 'input-select-search',
                'props' => [
                    'value' => 'currencies',
                    '_entities' => [
                        'endpoint' => [
                            'url' => 'some_url',
                        ],
                        'label' => 'name',
                        'value' => 'id',
                        'dataWrap' => 'data',
                    ],
                    '_addable' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_be_disabled()
    {
        $field = SelectSearch::make('Currencies')
            ->endpoint('some_url')
            ->label('name')
            ->value('id')
            ->disabled();

        $expected = [
            'name' => 'Currencies',
            'attribute' => 'currencies',
            'fieldType' => [
                'id' => 'input-select-search',
                'props' => [
                    'value' => 'currencies',
                    '_entities' => [
                        'endpoint' => [
                            'url' => 'some_url',
                        ],
                        'label' => 'name',
                        'value' => 'id',
                        'dataWrap' => 'data',
                    ],
                    '_disabled' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
