<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use Signifly\Travy\Schema\Fields\Input\Text;
use Signifly\Travy\Schema\Modal;
use Signifly\Travy\Schema\Tests\TestCase;

class ModalTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $action = Modal::make('Edit')
            ->endpoint('some_url')
            ->fields([
                Text::make('Name'),
            ]);

        $expected = [
            'name' => 'Edit',
            'status' => 'primary',
            'icon' => null,
            'actionType' => [
                'id' => 'modal',
                'props' => [
                    'name' => 'Edit',
                    'endpoint' => [
                        'url' => 'some_url',
                        'method' => 'post',
                    ],
                    'fields' => [
                        [
                            'name' => 'Name',
                            'fieldType' => [
                                'id' => 'input-text',
                                'props' => [
                                    'value' => '{name}',
                                ],
                            ],
                        ],
                    ],
                    'payload' => [
                        'data' => ['name' => ''],
                    ],
                ],
            ],
        ];
        $this->assertEquals($expected, $action->jsonSerialize());
    }
}
