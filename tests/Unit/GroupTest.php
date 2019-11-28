<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use Signifly\Travy\Schema\Fields\Text;
use Signifly\Travy\Schema\Group;
use Signifly\Travy\Schema\Tests\TestCase;

class GroupTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $action = Group::make('History')
            ->fields([
                Text::make('Name'),
            ]);

        $expected = [
            'name' => 'History',
            'fields' => [
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
        ];
        $this->assertEquals($expected, $action->jsonSerialize());
    }
}