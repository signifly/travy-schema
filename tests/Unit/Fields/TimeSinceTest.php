<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Fields\TimeSince;

class TimeSinceTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $date = TimeSince::make('Created at');

        $expected = [
            'name' => 'Created at',
            'fieldType' => [
                'id' => 'time-since',
                'props' => [
                    'timestamp' => '{created_at}',
                ],
            ],
        ];
        $this->assertEquals($expected, $date->jsonSerialize());
    }
}
