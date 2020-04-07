<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use Signifly\Travy\Schema\Fields\Text;
use Signifly\Travy\Schema\Support\Comparator;
use Signifly\Travy\Schema\Support\Operator;
use Signifly\Travy\Schema\Support\Tooltip;
use PHPUnit\Framework\TestCase;

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
    public function it_can_be_shown_based_on_comparators()
    {
        // Multiple comparators use OR checks
        $field = Text::make('Name')
            ->show([
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
            'show' => [
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

    /** @test */
    public function it_can_set_a_tooltip()
    {
        $field = Text::make('Name')
            ->tooltip([
                Tooltip::make('Displays the full name')
                    ->show('is_active', true),
            ]);

        $expected = [
            'name' => 'Name',
            'fieldType' => [
                'id' => 'text',
                'props' => [
                    'text' => '{name}',
                ],
            ],
            'tooltip' => [
                [
                    'text' => 'Displays the full name',
                    'show' => [
                        'key' => '{is_active}',
                        'operator' => Operator::EQ,
                        'value' => true,
                    ],
                ],
            ],
        ];

        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
