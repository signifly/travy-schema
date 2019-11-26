<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\DateRangePicker;
use Signifly\Travy\Schema\Tests\TestCase;

class DateRangePickerTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = DateRangePicker::make('Accessibility')
            ->start('start_date')
            ->end('end_date');

        $expected = [
            'name' => 'Accessibility',
            'attribute' => 'accessibility',
            'fieldType' => [
                'id' => 'input-date-range',
                'props' => [
                    'dateStart' => 'start_date',
                    'dateEnd' => 'end_date',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_is_clearable()
    {
        $field = DateRangePicker::make('Accessibility')
            ->start('start_date')
            ->end('end_date')
            ->clearable();

        $expected = [
            'name' => 'Accessibility',
            'attribute' => 'accessibility',
            'fieldType' => [
                'id' => 'input-date-range',
                'props' => [
                    'dateStart' => 'start_date',
                    'dateEnd' => 'end_date',
                    '_clearable' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
