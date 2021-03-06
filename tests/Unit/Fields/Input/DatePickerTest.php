<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Fields\Input\DatePicker;

class DatePickerTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = DatePicker::make('Date');

        $expected = [
            'name' => 'Date',
            'fieldType' => [
                'id' => 'input-date',
                'props' => [
                    'date' => '{date}',
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
            'fieldType' => [
                'id' => 'input-date',
                'props' => [
                    'date' => '{date}',
                    'clearable' => true,
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
            'fieldType' => [
                'id' => 'input-date',
                'props' => [
                    'date' => '{date}',
                    'disabled' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
