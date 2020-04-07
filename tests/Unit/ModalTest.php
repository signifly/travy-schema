<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Fields\Input\Text;
use Signifly\Travy\Schema\Modal;
use Signifly\Travy\Schema\Support\Comparator;

class ModalTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $action = Modal::make('Edit')
            ->endpoint('some_url')
            ->fields([
                $fieldA = Text::make('Name'),
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
                        $fieldA->jsonSerialize(),
                    ],
                    'payload' => [
                        'data' => ['name' => ''],
                    ],
                ],
            ],
        ];
        $this->assertEquals($expected, $action->jsonSerialize());
    }

    /** @test */
    public function it_disables_submit()
    {
        $action = Modal::make('Edit')
            ->endpoint('some_url')
            ->fields([
                $fieldA = Text::make('Name'),
            ])
            ->disableSubmit([
                $comparatorA = new Comparator('is_disabled', true),
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
                        $fieldA->jsonSerialize(),
                    ],
                    'payload' => [
                        'data' => ['name' => ''],
                    ],
                    'disableSubmit' => [
                        $comparatorA->jsonSerialize(),
                    ],
                ],
            ],
        ];
        $this->assertEquals($expected, $action->jsonSerialize());
    }
}
