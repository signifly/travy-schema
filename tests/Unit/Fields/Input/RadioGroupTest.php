<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\RadioGroup;
use PHPUnit\Framework\TestCase;

class RadioGroupTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = RadioGroup::make('Option')
            ->items($items = $this->validItems());

        $expected = [
            'name' => 'Option',
            'fieldType' => [
                'id' => 'input-radio-group',
                'props' => [
                    'value' => '{option}',
                    'items' => $items,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_be_disabled()
    {
        $field = RadioGroup::make('Option')
            ->items($items = $this->validItems())
            ->disabled();

        $expected = [
            'name' => 'Option',
            'fieldType' => [
                'id' => 'input-radio-group',
                'props' => [
                    'value' => '{option}',
                    'items' => $items,
                    'disabled' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    protected function validItems(): array
    {
        return [
            ['label' => 'Option A', 'value' => true],
            ['label' => 'Option B', 'value' => false],
        ];
    }
}
