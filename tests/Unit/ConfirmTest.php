<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use Signifly\Travy\Schema\Confirm;
use Signifly\Travy\Schema\Tests\TestCase;

class ConfirmTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $action = Confirm::make('Delete', 'danger', 'trash')
            ->endpoint('some_url', 'delete');

        $expected = [
            'name' => 'Delete',
            'status' => 'danger',
            'icon' => 'trash',
            'actionType' => [
                'id' => 'confirm',
                'props' => [
                    'title' => 'Delete',
                    'text' => $action->defaultText(),
                    'endpoint' => [
                        'url' => 'some_url',
                        'method' => 'delete',
                    ],
                    'payload' => (object) [],
                ],
            ],
        ];
        $this->assertEquals($expected, $action->jsonSerialize());
    }
}
