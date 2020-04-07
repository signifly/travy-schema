<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use Signifly\Travy\Schema\Fields\Progress;
use PHPUnit\Framework\TestCase;

class ProgressTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Progress::make('Status')
            ->color('danger');

        $expected = [
            'name' => 'Status',
            'fieldType' => [
                'id' => 'progress',
                'props' => [
                    'percentage' => '{status}',
                    'status' => '{danger}',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
