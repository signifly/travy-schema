<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Fields\Input\Textarea;
use Signifly\Travy\Schema\Fields\Text;
use Signifly\Travy\Schema\Tab;
use Signifly\Travy\Schema\Tests\Support\Table\TestTable;

class TabTest extends TestCase
{
    /** @test */
    public function it_serializes_a_fields_tab_to_json()
    {
        $tab = Tab::make('General', [
            Text::make('Name'),
            Textarea::make('Description'),
        ]);

        tap($tab->jsonSerialize(), function ($data) {
            $this->assertEquals('General', $data['name']);
            $this->assertEquals('fields', $data['type']);
            $this->assertEquals(null, Arr::get($data, 'definitions.endpoint.url'));
            $this->assertCount(2, Arr::get($data, 'definitions.fields'));
        });
    }

    /** @test */
    public function it_serializes_a_table_tab_to_json()
    {
        $request = app(Request::class);
        $tab = Tab::make('Table tab', new TestTable($request));

        tap($tab->jsonSerialize(), function ($data) {
            $this->assertEquals('Table tab', $data['name']);
            $this->assertEquals('table', $data['type']);
            $this->assertEquals('some_url', Arr::get($data, 'definitions.endpoint.url'));
            $this->assertCount(1, Arr::get($data, 'definitions.columns'));
        });
    }
}
