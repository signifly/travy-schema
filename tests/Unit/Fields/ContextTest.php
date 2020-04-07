<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use Signifly\Travy\Schema\Fields\Context;
use Signifly\Travy\Schema\Fields\Text;
use PHPUnit\Framework\TestCase;

class ContextTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Context::attr('product_id')
            ->endpoint('some_url')
            ->fields([
                Text::make('Name'),
            ]);

        $expected = [
            'name' => null,
            'fieldType' => [
                'id' => 'context',
                'props' => [
                    'attribute' => '{product_id}',
                    'endpoint' => ['url' => 'some_url'],
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
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
