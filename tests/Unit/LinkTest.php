<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Link;

class LinkTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $action = Link::make('View')
            ->url('some_url');

        $expected = [
            'name' => 'View',
            'status' => 'primary',
            'icon' => null,
            'actionType' => [
                'id' => 'link',
                'props' => [
                    'url' => 'some_url',
                    'external' => false,
                ],
            ],
        ];
        $this->assertEquals($expected, $action->jsonSerialize());
    }
}
