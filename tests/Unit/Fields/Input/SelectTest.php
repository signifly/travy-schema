<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\Select;
use Signifly\Travy\Schema\Tests\TestCase;

class SelectTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Select::make('Currency', 'currency_id')
            ->items($items = [
                ['label' => 'DKK', 'value' => 'DKK'],
                ['label' => 'NOK', 'value' => 'NOK'],
            ]);

        $expected = [
            'name' => 'Currency',
            'attribute' => 'currency_id',
            'fieldType' => [
                'id' => 'input-select',
                'props' => [
                    'value' => 'currency_id',
                    '_entities' => $items,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
