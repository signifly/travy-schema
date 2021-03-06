<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Concerns\WithFilters;
use Signifly\Travy\Schema\Fields\Input\Select;
use Signifly\Travy\Schema\Tests\Support\Table\TestTable;

class TableTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $request = app(Request::class);
        $table = new TestTable($request);

        tap($table->jsonSerialize(), function ($data) {
            $this->assertCount(1, Arr::get($data, 'columns'));
            $this->assertEquals('some_url', Arr::get($data, 'endpoint.url'));
        });
    }

    /** @test */
    public function it_can_serialize_with_filters()
    {
        $request = app(Request::class);

        $table = new class($request) extends TestTable implements WithFilters {
            public function filters(): array
            {
                return [
                    Select::make('Currency')
                        ->items([
                            ['label' => 'DKK', 'value' => 'DKK'],
                            ['label' => 'NOK', 'value' => 'NOK'],
                        ]),
                ];
            }
        };

        tap($table->jsonSerialize(), function ($data) {
            $this->assertCount(1, Arr::get($data, 'columns'));
            $this->assertEquals('some_url', Arr::get($data, 'endpoint.url'));
            $this->assertCount(1, Arr::get($data, 'filters.fields'));
        });
    }
}
