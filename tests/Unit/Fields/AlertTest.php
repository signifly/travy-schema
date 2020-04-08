<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Fields\Alert;

class AlertTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Alert::make('Title')
            ->text('Some text');

        $expected = [
            'name' => null,
            'fieldType' => [
                'id' => 'alert',
                'props' => [
                    'title' => 'Title',
                    'text' => 'Some text',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
