<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use Signifly\Travy\Schema\Popup;
use Signifly\Travy\Schema\Tests\TestCase;

class PopupTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $action = Popup::make('Delete', 'danger', 'trash')
            ->endpoint('some_url', 'delete');

        $expected = [
            'name' => 'Delete',
            'status' => 'danger',
            'icon' => 'trash',
            'actionType' => [
                'id' => 'popup',
                'props' => [
                    'title' => 'Delete',
                    'text' => $action->defaultText(),
                    'endpoint' => [
                        'url' => 'some_url',
                        'method' => 'delete',
                    ],
                    'payload' => $this->payload ?? (object) [],
                ],
            ],
        ];
        $this->assertEquals($expected, $action->jsonSerialize());
    }
}
