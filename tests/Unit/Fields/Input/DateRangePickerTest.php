<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Fields\Input\DateRangePicker;

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
            'fieldType' => [
                'id' => 'input-date-range',
                'props' => [
                    'dateStart' => '{start_date}',
                    'dateEnd' => '{end_date}',
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
            ->clearable(true);

        $expected = [
            'name' => 'Accessibility',
            'fieldType' => [
                'id' => 'input-date-range',
                'props' => [
                    'dateStart' => '{start_date}',
                    'dateEnd' => '{end_date}',
                    'clearable' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_be_disabled()
    {
        $field = DateRangePicker::make('Accessibility')
            ->start('start_date')
            ->end('end_date')
            ->disabled();

        $expected = [
            'name' => 'Accessibility',
            'fieldType' => [
                'id' => 'input-date-range',
                'props' => [
                    'dateStart' => '{start_date}',
                    'dateEnd' => '{end_date}',
                    'disabled' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
