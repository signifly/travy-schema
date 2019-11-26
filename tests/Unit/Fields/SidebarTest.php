<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use Signifly\Travy\Schema\Fields\Date;
use Signifly\Travy\Schema\Fields\Sidebar;
use Signifly\Travy\Schema\Tests\TestCase;

class SidebarTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Sidebar::make('History')
            ->fields([
                Date::make('Created at'),
            ]);

        $expected = [
            'id' => 'history',
            'title' => 'History',
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
