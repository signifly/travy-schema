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
            ->items($items = $this->validItems());

        $expected = [
            'name' => 'Currency',
            'fieldType' => [
                'id' => 'input-select',
                'props' => [
                    'value' => '{currency_id}',
                    'entities' => $items,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_is_clearable()
    {
        $field = Select::make('Currency', 'currency_id')
            ->items($items = $this->validItems())
            ->clearable();

        $expected = [
            'name' => 'Currency',
            'fieldType' => [
                'id' => 'input-select',
                'props' => [
                    'value' => '{currency_id}',
                    'entities' => $items,
                    'clearable' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_be_disabled()
    {
        $field = Select::make('Currency', 'currency_id')
            ->items($items = $this->validItems())
            ->disabled();

        $expected = [
            'name' => 'Currency',
            'fieldType' => [
                'id' => 'input-select',
                'props' => [
                    'value' => '{currency_id}',
                    'entities' => $items,
                    'disabled' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    protected function validItems(): array
    {
        return [
            ['label' => 'DKK', 'value' => 'DKK'],
            ['label' => 'NOK', 'value' => 'NOK'],
        ];
    }
}
