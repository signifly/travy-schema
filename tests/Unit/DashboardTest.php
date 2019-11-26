<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use Illuminate\Support\Arr;
use Signifly\Travy\Schema\Dashboard;
use Signifly\Travy\Schema\Fields\Section;
use Signifly\Travy\Schema\Tests\TestCase;

class DashboardTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        $dashboard = new class extends Dashboard {
            public function sections(): array
            {
                return [
                    Section::make('Default')
                        ->type('table')
                        ->endpoint('some_url'),
                ];
            }
        };

        tap($dashboard->jsonSerialize(), function ($data) {
            $this->assertCount(1, Arr::get($data, 'sections'));
            $this->assertEquals('Default', Arr::get($data, 'sections.0.title.text'));
            $this->assertEquals('table', Arr::get($data, 'sections.0.type'));
            $this->assertEquals('some_url', Arr::get($data, 'sections.0._endpoint.url'));
        });
    }
}
