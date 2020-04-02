<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use Signifly\Travy\Schema\Batch;
use Signifly\Travy\Schema\Confirm;
use Signifly\Travy\Schema\Tests\TestCase;

class BatchTest extends TestCase
{
    /** @test */
    public function it_enables_sequential_edit()
    {
        $batch = Batch::make('name', '/t/products/{id}');

        $expected = [
            'selectedOptions' => [
                'label' => 'name',
                'link' => '/t/products/{id}',
            ],
            'sequential' => [
                'url' => '/t/products/{id}',
            ],
        ];
        $this->assertEquals($expected, $batch->jsonSerialize());
    }

    /** @test */
    public function it_has_bulk_actions()
    {
        $batch = Batch::make('name', '/t/products/{id}')
            ->action(
                Confirm::make('Delete selected items')
                    ->endpoint(url('v1/admin/products/{id}'))
            );

        $expected = [
            'bulk' => [
                'action' => [
                    'name' => 'Delete selected items',
                    'status' => 'primary',
                    'icon' => null,
                    'actionType' => [
                        'id' => 'popup',
                        'props' => [
                            'title' => 'Delete selected items',
                            'text' => 'Are you sure? Please confirm this action.',
                            'endpoint' => [
                                'url' => 'http://localhost/v1/admin/products/{id}',
                                'method' => 'post',
                            ],
                            'payload' => (object) [],
                        ],
                    ],
                ],
            ],
            'selectedOptions' => [
                'label' => 'name',
                'link' => '/t/products/{id}',
            ],
            'sequential' => [
                'url' => '/t/products/{id}',
            ],
        ];
        $this->assertEquals($expected, $batch->jsonSerialize());
    }
}
