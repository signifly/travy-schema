<?php

namespace Signifly\Travy\Schema\Tests\Unit;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Tests\Support\Index\ModifierShopIndex;
use Signifly\Travy\Schema\Tests\Support\Index\ShopIndex;

class IndexTest extends TestCase
{
    /** @test */
    public function it_serializes_to_json()
    {
        // Arrange
        $request = app(Request::class);
        $index = new ShopIndex($request);

        // Act
        $schema = $index->jsonSerialize();

        // Assert
        $this->assertArrayHasKey('pageTitle', $schema);
        $this->assertArrayHasKey('hero', $schema);
        $this->assertArrayHasKey('tabs', $schema);
        $this->assertArrayNotHasKey('modifiers', $schema);

        $this->assertEquals('Shops', Arr::get($schema, 'pageTitle'));
        $this->assertEquals('Welcome back, {name}', Arr::get($schema, 'hero.title'));
    }

    /** @test */
    public function it_can_include_modifiers()
    {
        // Arrange
        $request = app(Request::class);
        $index = new ModifierShopIndex($request);

        // Act
        $schema = $index->jsonSerialize();

        // Assert
        $this->assertArrayHasKey('pageTitle', $schema);
        $this->assertArrayHasKey('hero', $schema);
        $this->assertArrayHasKey('tabs', $schema);
        $this->assertArrayHasKey('modifiers', $schema);

        $this->assertEquals('Shops', Arr::get($schema, 'pageTitle'));
        $this->assertEquals('Welcome back, {name}', Arr::get($schema, 'hero.title'));
    }
}
