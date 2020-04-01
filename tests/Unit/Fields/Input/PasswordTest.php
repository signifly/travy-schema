<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\Password;
use Signifly\Travy\Schema\Tests\TestCase;

class PasswordTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Password::make('Password');

        $expected = [
            'name' => 'Password',
            'attribute' => 'password',
            'fieldType' => [
                'id' => 'input-password',
                'props' => [
                    'value' => '{password}',
                    'autocomplete' => 'new-password',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
