<?php

namespace Signifly\Travy\Schema\Tests\Unit\Support;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Support\CustomMapping;
use Signifly\Travy\Schema\Support\PropsResolver;

class PropsResolverTest extends TestCase
{
    protected $resolver;

    public function setUp(): void
    {
        parent::setUp();

        $this->resolver = new PropsResolver();
    }

    /** @test */
    public function it_resolves_mapped_props()
    {
        $props = [
            'this' => 'that',
            'list' => [
                ['key_a' => 'value_aa', 'key_b' => 'value_ba'],
                ['key_a' => 'value_ab', 'key_b' => 'value_bb'],
                ['key_a' => 'value_ac', 'key_b' => 'value_bc'],
            ],
        ];

        $expected = [
            'this' => '{that}',
            'list' => [
                ['key_a' => '{value_aa}', 'key_b' => '{value_ba}'],
                ['key_a' => '{value_ab}', 'key_b' => '{value_bb}'],
                ['key_a' => '{value_ac}', 'key_b' => '{value_bc}'],
            ],
        ];

        $this->assertSame($expected, $this->resolver->resolve($props));
    }

    /** @test */
    public function it_resolves_unmapped_props()
    {
        $props = [
            'this' => new CustomMapping('that'),
            'list' => [
                ['key_a' => 'value_aa', 'key_b' => 'value_ba'],
                ['key_a' => 'value_ab', 'key_b' => new CustomMapping('value_bb')],
                ['key_a' => 'value_ac', 'key_b' => 'value_bc'],
            ],
        ];

        $expected = [
            'this' => 'that',
            'list' => [
                ['key_a' => '{value_aa}', 'key_b' => '{value_ba}'],
                ['key_a' => '{value_ab}', 'key_b' => 'value_bb'],
                ['key_a' => '{value_ac}', 'key_b' => '{value_bc}'],
            ],
        ];

        $this->assertSame($expected, $this->resolver->resolve($props));
    }
}
