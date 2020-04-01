<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use Signifly\Travy\Schema\Fields\Date;
use Signifly\Travy\Schema\Support\UnmappedProp;
use Signifly\Travy\Schema\Tests\TestCase;

class DateTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $date = Date::make('Created at');

        $expected = [
            'name' => 'Created at',
            'fieldType' => [
                'id' => 'date',
                'props' => [
                    'timestamp' => '{created_at}',
                ],
            ],
        ];
        $this->assertEquals($expected, $date->jsonSerialize());
    }

    /** @test */
    public function it_serializes_unmapped_timestamp_to_json()
    {
        $time = time();
        $date = Date::make('Created at', new UnmappedProp($time));

        $expected = [
            'name' => 'Created at',
            'fieldType' => [
                'id' => 'date',
                'props' => [
                    'timestamp' => $time,
                ],
            ],
        ];
        $this->assertEquals($expected, $date->jsonSerialize());
    }

    /** @test */
    public function it_allows_to_set_width()
    {
        $date = Date::make('Created at')
            ->width(50);

        $this->assertEquals(50, $date->getMeta('width'));
    }
}
