<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\SelectMulti;
use Signifly\Travy\Schema\Tests\TestCase;

class SelectMultiTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = SelectMulti::make('Currencies')
            ->items($items = $this->validItems());

        $expected = [
            'name' => 'Currencies',
            'attribute' => 'currencies',
            'fieldType' => [
                'id' => 'input-select-multi',
                'props' => [
                    'value' => '{currencies}',
                    'entities' => $items,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_is_addable()
    {
        $field = SelectMulti::make('Currencies')
            ->items($items = $this->validItems())
            ->addable();

        $expected = [
            'name' => 'Currencies',
            'attribute' => 'currencies',
            'fieldType' => [
                'id' => 'input-select-multi',
                'props' => [
                    'value' => '{currencies}',
                    'entities' => $items,
                    'addable' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_is_clearable()
    {
        $field = SelectMulti::make('Currencies')
            ->items($items = $this->validItems())
            ->clearable();

        $expected = [
            'name' => 'Currencies',
            'attribute' => 'currencies',
            'fieldType' => [
                'id' => 'input-select-multi',
                'props' => [
                    'value' => '{currencies}',
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
        $field = SelectMulti::make('Currencies')
            ->items($items = $this->validItems())
            ->disabled();

        $expected = [
            'name' => 'Currencies',
            'attribute' => 'currencies',
            'fieldType' => [
                'id' => 'input-select-multi',
                'props' => [
                    'value' => '{currencies}',
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
