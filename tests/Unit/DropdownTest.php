<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use Signifly\Travy\Schema\Dropdown;
use Signifly\Travy\Schema\Popup;
use Signifly\Travy\Schema\Tests\TestCase;

class DropdownTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $action = Dropdown::make('More')
            ->actions([
                $popup = Popup::make('Delete')
                    ->endpoint('some_url', 'delete'),
            ]);

        $expected = [
            'name' => 'More',
            'status' => 'primary',
            'icon' => null,
            'actionType' => [
                'id' => 'dropdown',
                'props' => [
                    'actions' => [
                        [
                            'name' => 'Delete',
                            'status' => 'primary',
                            'icon' => null,
                            'actionType' => [
                                'id' => 'popup',
                                'props' => [
                                    'title' => 'Delete',
                                    'text' => $popup->defaultText(),
                                    'endpoint' => [
                                        'url' => 'some_url',
                                        'method' => 'delete',
                                    ],
                                    'payload' => $this->payload ?? (object) [],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $this->assertEquals($expected, $action->jsonSerialize());
    }

    /** @test */
    public function it_sets_the_size_of_the_action_button()
    {
        $action = Dropdown::make('More')
            ->size('mini')
            ->actions([
                $popup = Popup::make('Delete')
                    ->endpoint('some_url', 'delete'),
            ]);

        $expected = [
            'name' => 'More',
            'status' => 'primary',
            'icon' => null,
            'size' => 'mini',
            'actionType' => [
                'id' => 'dropdown',
                'props' => [
                    'actions' => [
                        [
                            'name' => 'Delete',
                            'status' => 'primary',
                            'icon' => null,
                            'actionType' => [
                                'id' => 'popup',
                                'props' => [
                                    'title' => 'Delete',
                                    'text' => $popup->defaultText(),
                                    'endpoint' => [
                                        'url' => 'some_url',
                                        'method' => 'delete',
                                    ],
                                    'payload' => $this->payload ?? (object) [],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $this->assertEquals($expected, $action->jsonSerialize());
    }
}
