<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Signifly\Travy\Schema\Config;
use Signifly\Travy\Schema\Dashboard;
use Signifly\Travy\Schema\Fields\Section;
use Signifly\Travy\Schema\Header;
use Signifly\Travy\Schema\MenuItem;
use Signifly\Travy\Schema\Tests\TestCase;
use Signifly\Travy\Schema\Theme;

class ConfigTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $request = app(Request::class);
        $config = new MyConfig($request);

        $expected = [
            'frontpage' => '/i/products',
            'title' => 'Travy',
            'locale' => 'en',
            'theme' => [
                'cover' => 'https://picsum.photos/id/135/2560/1920',
                'logo' => 'https://picsum.photos/id/135/200/50',
                'color' => '#130f40',
            ],
            'header' => [
                'notifications' => false,
                'link' => [
                    'url' => 'https://google.dk',
                    'name' => 'Back to shop',
                ],
                'menu' => [
                    ['name' => 'Catalog', 'items' => [
                        ['name' => 'Products', 'url' => '/i/products'],
                        ['name' => 'Collections', 'url' => '/i/collections'],
                    ]],
                    ['name' => 'Shops', 'url' => '/i/shops'],
                    ['name' => 'Currencies', 'url' => '/i/currencies'],
                    ['name' => 'Languages', 'url' => '/i/languages'],
                ],
            ],
        ];
        $this->assertEquals($expected, $config->jsonSerialize());
    }
}

class MyConfig extends Config
{
    public function frontpage(): string
    {
        return '/i/products';
    }

    public function header(): Header
    {
        return Header::make([
            MenuItem::make('Catalog')
                ->items([
                    new MenuItem('Products', '/i/products'),
                    new MenuItem('Collections', '/i/collections'),
                ]),
            MenuItem::make('Shops', '/i/shops'),
            MenuItem::make('Currencies', '/i/currencies'),
            MenuItem::make('Languages', '/i/languages'),
        ])->link('https://google.dk', 'Back to shop');
    }

    public function locale(): string
    {
        return 'en';
    }

    public function title(): string
    {
        return 'Travy';
    }

    public function theme(): Theme
    {
        return new Theme(
            'https://picsum.photos/id/135/2560/1920',
            'https://picsum.photos/id/135/200/50',
            '#130f40'
        );
    }
}
