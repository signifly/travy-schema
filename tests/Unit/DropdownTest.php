<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Confirm;
use Signifly\Travy\Schema\Dropdown;

class DropdownTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $action = Dropdown::make('More')
            ->actions([
                $confirm = Confirm::make('Delete')
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
                                'id' => 'confirm',
                                'props' => [
                                    'title' => 'Delete',
                                    'text' => $confirm->defaultText(),
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
                $confirm = Confirm::make('Delete')
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
                                'id' => 'confirm',
                                'props' => [
                                    'title' => 'Delete',
                                    'text' => $confirm->defaultText(),
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
