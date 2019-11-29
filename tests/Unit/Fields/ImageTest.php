<?php

namespace Signifly\Travy\Schema\Tests\Unit\Fields;

use Signifly\Travy\Schema\Fields\Image;
use Signifly\Travy\Schema\Support\UnmappedProp;
use Signifly\Travy\Schema\Tests\TestCase;

class ImageTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $field = Image::make('Image', 'src')
            ->size('100%', '300px');

        $expected = [
            'name' => 'Image',
            'attribute' => 'src',
            'fieldType' => [
                'id' => 'image',
                'props' => [
                    'src' => 'src',
                    '_width' => '100%',
                    '_height' => '300px',
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
            'attribute' => 'src',
            'fieldType' => [
                'id' => 'image',
                'props' => [
                    'src' => 'src',
                    '_width' => '100%',
                    '_height' => '300px',
                    '_fit' => 'contain',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }

    /** @test */
    public function it_can_use_unmapped_props()
    {
        $field = Image::make('Image', new UnmappedProp('test'))
            ->size('100%', '300px')
            ->fit('contain');

        $expected = [
            'name' => 'Image',
            'attribute' => 'image',
            'fieldType' => [
                'id' => 'image',
                'props' => [
                    '_src' => 'test',
                    '_width' => '100%',
                    '_height' => '300px',
                    '_fit' => 'contain',
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
            'attribute' => 'src',
            'fieldType' => [
                'id' => 'image',
                'props' => [
                    'src' => 'src',
                    '_width' => '100%',
                    '_height' => '300px',
                    'fit' => 'fit',
                ],
            ],
        ];
        $this->assertEquals($expected, $field->jsonSerialize());
    }
}
