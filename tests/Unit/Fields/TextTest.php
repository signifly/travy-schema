<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use Signifly\Travy\Schema\Fields\Text;
use Signifly\Travy\Schema\Support\Comparator;
use Signifly\Travy\Schema\Support\Operator;
use Signifly\Travy\Schema\Tests\TestCase;

class TextTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Text::make('Name');

        $expected = [
            'name' => 'Name',
            'fieldType' => [
                'id' => 'text',
                'props' => [
                    'text' => '{name}',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_be_hidden_based_on_a_comparator()
    {
        // Multiple comparators use OR checks
        $field = Text::make('Name')
            ->hide([
                new Comparator('name', 'Test'),
                new Comparator('name', 'Banan', Operator::NEQ),
            ]);

        $expected = [
            'name' => 'Name',
            'fieldType' => [
                'id' => 'text',
                'props' => [
                    'text' => '{name}',
                ],
            ],
            'hide' => [
                [
                    'key' => '{name}',
                    'operator' => Operator::EQ,
                    'value' => 'Test',
                ],
                [
                    'key' => '{name}',
                    'operator' => Operator::NEQ,
                    'value' => 'Banan',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
