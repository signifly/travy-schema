<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use Signifly\Travy\Schema\Fields\Image;
use Signifly\Travy\Schema\Support\CustomMapping;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Image::make('Image', 'src')
            ->size('100%', '300px');

        $expected = [
            'name' => 'Image',
            'fieldType' => [
                'id' => 'image',
                'props' => [
                    'src' => '{src}',
                    'width' => '100%',
                    'height' => '300px',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_set_the_fit_prop()
    {
        $field = Image::make('Image', 'src')
            ->size('100%', '300px')
            ->fit('contain');

        $expected = [
            'name' => 'Image',
            'fieldType' => [
                'id' => 'image',
                'props' => [
                    'src' => '{src}',
                    'width' => '100%',
                    'height' => '300px',
                    'fit' => 'contain',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_use_unmapped_props()
    {
        $field = Image::make('Image', new CustomMapping('test'))
            ->size('100%', '300px')
            ->fit('contain');

        $expected = [
            'name' => 'Image',
            'fieldType' => [
                'id' => 'image',
                'props' => [
                    'src' => 'test',
                    'width' => '100%',
                    'height' => '300px',
                    'fit' => 'contain',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_override_fit_prop_as_mapped()
    {
        $field = Image::make('Image', 'src')
            ->size('100%', '300px')
            ->fit('fit', true);

        $expected = [
            'name' => 'Image',
            'fieldType' => [
                'id' => 'image',
                'props' => [
                    'src' => '{src}',
                    'width' => '100%',
                    'height' => '300px',
                    'fit' => '{fit}',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
