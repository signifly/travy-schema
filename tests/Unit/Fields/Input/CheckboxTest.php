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
            'fieldType' => [
                'id' => 'input-checkbox',
                'props' => [
                    'value' => '{accept_terms}',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_be_disabled()
    {
        $field = Checkbox::make('Accept Terms')
            ->disabled();

        $expected = [
            'name' => 'Accept Terms',
            'fieldType' => [
                'id' => 'input-checkbox',
                'props' => [
                    'value' => '{accept_terms}',
                    'disabled' => true,
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
