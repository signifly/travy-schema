<?php

namespace Signifly\Travy\Schema\Tests\Unit\Support;

use Signifly\Travy\Schema\Support\AttributeResolver;
use Signifly\Travy\Schema\Support\UnmappedProp;
use Signifly\Travy\Schema\Tests\TestCase;

class AttributeResolverTest extends TestCase
{
    protected $resolver;

    public function setUp(): void
    {
        parent::setUp();

        $this->resolver = new AttributeResolver();
    }

    /** @test */
    public function it_resolves_a_string()
    {
        $attribute = 'some_attribute';
        $fallback = 'fallback';

        $this->assertSame($attribute, ($this->resolver->resolve($attribute, $fallback)));
    }

    /** @test */
    public function it_resolves_an_unmapped_prop_without_a_specified_attribute_value()
    {
        $attribute = new UnmappedProp('some_value');
        $fallback = 'fallback';

        $this->assertSame($fallback, ($this->resolver->resolve($attribute, $fallback)));
    }

    /** @test */
    public function it_resolves_an_unmapped_prop_with_a_specified_attribute_value()
    {
        $specifiedAttributeValue = 'specified_attribute_value';
        $attribute = new UnmappedProp('some_value', $specifiedAttributeValue);
        $fallback = 'fallback';

        $this->assertSame($specifiedAttributeValue, ($this->resolver->resolve($attribute, $fallback)));
    }
}
