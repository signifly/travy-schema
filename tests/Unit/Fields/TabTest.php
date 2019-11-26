<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use Signifly\Travy\Schema\Fields\Date;
use Signifly\Travy\Schema\Fields\Tab;
use Signifly\Travy\Schema\Tests\TestCase;

class TabTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Tab::make('Details')
            ->endpoint(url('v1/admin/products/{id}'))
            ->fields([
                Date::make('Created at'),
            ]);

        $expected = [
            'id' => 'details',
            'type' => 'fields',
            '_endpoint' => ['url' => 'http://localhost/v1/admin/products/{id}'],
            'title' => ['text' => 'Details', 'url' => ''],
            'fields' => [
                [
                    'name' => 'Created at',
                    'attribute' => 'created_at',
                    'fieldType' => [
                        'id' => 'date',
                        'props' => [
                            'timestamp' => 'created_at',
                        ],
                    ],
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
