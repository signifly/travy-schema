<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Fields\Text;
use Signifly\Travy\Schema\Group;

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
                    'fieldType' => [
                        'id' => 'text',
                        'props' => [
                            'text' => '{name}',
                        ],
                    ],
                ],
            ],
        ];
        $this->assertEquals($expected, $action->jsonSerialize());
    }
}
