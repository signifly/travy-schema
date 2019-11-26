<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\RadioGroup;
use Signifly\Travy\Schema\Tests\TestCase;

class RadioGroupTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = RadioGroup::make('Option')
            ->items($items = [
                ['label' => 'Option A', 'value' => true],
                ['label' => 'Option B', 'value' => false],
            ]);

        $expected = [
            'name' => 'Option',
            'attribute' => 'option',
            'fieldType' => [
                'id' => 'input-radio-group',
                'props' => [
                    'value' => 'option',
                    '_items' => $items,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
