<?php

namespace Signifly\Travy\Schema\Tests\Unit\Support;

use PHPUnit\Framework\TestCase;
use Signifly\Travy\Schema\Support\Comparator;
use Signifly\Travy\Schema\Support\Operator;

class ComparatorTest extends TestCase
{
    /** @test */
    public function it_serialies_to_json()
    {
        $comparator = new Comparator('some_key', true);

        $expected = [
            'key' => '{some_key}',
            'operator' => Operator::EQ,
            'value' => true,
        ];

        $this->assertSame($expected, $comparator->jsonSerialize());
    }

    /** @test */
    public function it_sets_the_operator()
    {
        $comparator = new Comparator('some_key', 10, Operator::GTE);

        $expected = [
            'key' => '{some_key}',
            'operator' => Operator::GTE,
            'value' => 10,
        ];

        $this->assertSame($expected, $comparator->jsonSerialize());
    }

    /** @test */
    public function it_allows_custom_mapping()
    {
        $comparator = new Comparator('{some_key} {some_other_key}', 'true false', Operator::EQ, false);

        $expected = [
            'key' => '{some_key} {some_other_key}',
            'operator' => Operator::EQ,
            'value' => 'true false',
        ];

        $this->assertSame($expected, $comparator->jsonSerialize());
    }
}
