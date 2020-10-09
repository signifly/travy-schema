<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Fields\Input\SelectSearch;

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
            'fieldType' => [
                'id' => 'input-select-search',
                'props' => [
                    'value' => '{currencies}',
                    'entities' => [
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
            'fieldType' => [
                'id' => 'input-select-search',
                'props' => [
                    'value' => '{currencies}',
                    'entities' => [
                        'endpoint' => [
                            'url' => 'some_url',
                        ],
                        'label' => 'name',
                        'value' => 'id',
                        'dataWrap' => 'data',
                    ],
                    'clearable' => true,
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
            'fieldType' => [
                'id' => 'input-select-search',
                'props' => [
                    'value' => '{currencies}',
                    'entities' => [
                        'endpoint' => [
                            'url' => 'some_url',
                        ],
                        'label' => 'name',
                        'value' => 'id',
                        'dataWrap' => 'data',
                    ],
                    'addable' => true,
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
            'fieldType' => [
                'id' => 'input-select-search',
                'props' => [
                    'value' => '{currencies}',
                    'entities' => [
                        'endpoint' => [
                            'url' => 'some_url',
                        ],
                        'label' => 'name',
                        'value' => 'id',
                        'dataWrap' => 'data',
                    ],
                    'disabled' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
