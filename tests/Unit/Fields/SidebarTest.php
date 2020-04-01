<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use Signifly\Travy\Schema\Fields\Date;
use Signifly\Travy\Schema\Group;
use Signifly\Travy\Schema\Sidebar;
use Signifly\Travy\Schema\Tests\TestCase;

class SidebarTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $sidebar = Sidebar::make('History', [
            new Group('History', [
                Date::make('Created at'),
            ]),
        ]);

        $expected = [
            'name' => 'History',
            'groups' => [
                [
                    'name' => 'History',
                    'fields' => [
                        [
                            'name' => 'Created at',
                            'fieldType' => [
                                'id' => 'date',
                                'props' => [
                                    'timestamp' => '{created_at}',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $this->assertEquals($expected, $sidebar->jsonSerialize());
    }
}
