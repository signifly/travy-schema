<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Fields\Fields;
use Signifly\Travy\Schema\Fields\Text;

class FieldsTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $fields = Fields::make('Name')->fields([
            Text::make('Name'),
        ]);

        $expected = [
            'name' => 'Name',
            'fieldType' => [
                'id' => 'fields',
                'props' => [
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
        $this->assertEquals($expected, $fields->jsonSerialize());
    }
}
