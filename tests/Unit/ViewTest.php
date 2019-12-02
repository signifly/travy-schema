<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Signifly\Travy\Schema\Fields\Input\Text;
use Signifly\Travy\Schema\Fields\Sidebar;
use Signifly\Travy\Schema\Tab;
use Signifly\Travy\Schema\Tests\Support\View\ModifierShopView;
use Signifly\Travy\Schema\Tests\Support\View\ShopView;
use Signifly\Travy\Schema\Tests\TestCase;

class ViewTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $request = app(Request::class);
        $view = new ShopView($request);

        tap($view->jsonSerialize(), function ($data) {
            $this->assertCount(1, Arr::get($data, 'tabs'));
            // $this->assertCount(1, Arr::get($data, 'sidebar'));
            $this->assertEquals('some_url', Arr::get($data, 'endpoint.url'));
            $this->assertEquals('Shop {name}', Arr::get($data, 'pageTitle'));
        });
    }

    /** @test */
    public function it_serialies_with_modifiers()
    {
        $request = app(Request::class);
        $view = new ModifierShopView($request);

        tap($view->jsonSerialize(), function ($data) {
            $this->assertCount(1, Arr::get($data, 'tabs'));
            $this->assertCount(1, Arr::get($data, 'modifiers.fields'));
            $this->assertEquals('some_url', Arr::get($data, 'endpoint.url'));
            $this->assertEquals('Shop {name}', Arr::get($data, 'pageTitle'));
        });
    }

    /** @test */
    public function it_defaults_to_view_endpoint_for_tabs_with_no_endpoint()
    {
        $request = app(Request::class);
        $view = new class($request) extends ShopView {
            public function tabs(): array
            {
                return [
                    Tab::make('Test', [
                        Text::make('Title'),
                    ]),
                ];
            }
        };

        tap($view->jsonSerialize(), function ($data) {
            $this->assertCount(1, Arr::get($data, 'tabs'));
            $this->assertEquals('some_url', Arr::get($data, 'tabs.0.definitions.endpoint.url'));
            $this->assertEquals('some_url', Arr::get($data, 'endpoint.url'));
            $this->assertEquals('Shop {name}', Arr::get($data, 'pageTitle'));
        });
    }
}
