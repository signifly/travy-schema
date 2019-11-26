<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\Toggle;
use Signifly\Travy\Schema\Tests\TestCase;

class ToggleTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Toggle::make('Accept Terms');

        $expected = [
            'name' => 'Accept Terms',
            'attribute' => 'accept_terms',
            'fieldType' => [
                'id' => 'input-switch',
                'props' => [
                    'value' => 'accept_terms',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
