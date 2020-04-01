<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields\Input;

use Signifly\Travy\Schema\Fields\Input\ImagePicker;
use Signifly\Travy\Schema\Tests\TestCase;

class ImagePickerTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = ImagePicker::make('Image', '{file_id}')
            ->endpoint('some_url')
            ->url('{image_url}')
            ->label('filename')
            ->size('80px', '80px');

        $expected = [
            'name' => 'Image',
            'attribute' => 'file_id',
            'fieldType' => [
                'id' => 'input-image-picker',
                'props' => [
                    'value' => '{file_id}',
                    'url' => '{image_url}',
                    'height' => '80px',
                    'width' => '80px',
                    'entities' => [
                        'endpoint' => [
                            'url' => 'some_url',
                        ],
                        'dataWrap' => 'data', // default
                        'value' => 'id', // default
                        'label' => 'filename',
                        'url' => 'image_url',
                    ],
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_overwrite_the_entity_url()
    {
        $field = ImagePicker::make('Image', 'file_id')
            ->endpoint('some_url')
            ->url('{image_url}')
            ->entityUrl('other_url')
            ->label('filename')
            ->size('80px', '80px');

        $expected = [
            'name' => 'Image',
            'attribute' => 'file_id',
            'fieldType' => [
                'id' => 'input-image-picker',
                'props' => [
                    'value' => 'file_id',
                    'url' => '{image_url}',
                    'height' => '80px',
                    'width' => '80px',
                    'entities' => [
                        'endpoint' => [
                            'url' => 'some_url',
                        ],
                        'dataWrap' => 'data', // default
                        'value' => 'id', // default
                        'label' => 'filename',
                        'url' => 'other_url',
                    ],
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
