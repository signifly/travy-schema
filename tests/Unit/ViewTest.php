<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Signifly\Travy\Schema\Concerns\WithModifiers;
use Signifly\Travy\Schema\Endpoint;
use Signifly\Travy\Schema\Fields\Input\Select;
use Signifly\Travy\Schema\Fields\Sidebar;
use Signifly\Travy\Schema\Tab;
use Signifly\Travy\Schema\Tests\Support\Table\TestTable;
use Signifly\Travy\Schema\Tests\TestCase;
use Signifly\Travy\Schema\View;

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
}

class ShopView extends View
{
    public function pageTitle(): string
    {
        return 'Shop {name}';
    }

    public function hero(): array
    {
        return [
            'title' => '{name}',
            'subtitle' => 'Lorem ipsum bla bla bla bla',
        ];
    }

    public function tabs(): array
    {
        return [
            Tab::make('Details', new TestTable($this->request)),
        ];
    }

    public function endpoint(): Endpoint
    {
        return new Endpoint('some_url');
    }
}

class ModifierShopView extends ShopView implements WithModifiers
{
    public function modifiers(): array
    {
        return [
            Select::make('Shop')
                ->items([
                    ['label' => 'Test', 'value' => 'test'],
                    ['label' => 'Test 2', 'value' => 'test-2'],
                ]),
        ];
    }
}
