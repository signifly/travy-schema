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
                        'itemKey' => 'data',
                    ],
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
