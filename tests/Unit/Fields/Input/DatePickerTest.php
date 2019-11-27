<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\DatePicker;
use Signifly\Travy\Schema\Tests\TestCase;

class DatePickerTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = DatePicker::make('Date');

        $expected = [
            'name' => 'Date',
            'attribute' => 'date',
            'fieldType' => [
                'id' => 'input-date',
                'props' => [
                    'date' => 'date',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_is_clearable()
    {
        $field = DatePicker::make('Date')
            ->clearable();

        $expected = [
            'name' => 'Date',
            'attribute' => 'date',
            'fieldType' => [
                'id' => 'input-date',
                'props' => [
                    'date' => 'date',
                    '_clearable' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_be_disabled()
    {
        $field = DatePicker::make('Date')
            ->disabled();

        $expected = [
            'name' => 'Date',
            'attribute' => 'date',
            'fieldType' => [
                'id' => 'input-date',
                'props' => [
                    'date' => 'date',
                    '_disabled' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
