<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\Checkbox;
use Signifly\Travy\Schema\Tests\TestCase;

class CheckboxTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Checkbox::make('Accept Terms');

        $expected = [
            'name' => 'Accept Terms',
            'attribute' => 'accept_terms',
            'fieldType' => [
                'id' => 'input-checkbox',
                'props' => [
                    'value' => 'accept_terms',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
