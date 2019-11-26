<?php

namespace Signifly\Travy\Schema\Tests\Support\View;

use Signifly\Travy\Schema\Concerns\WithModifiers;
use Signifly\Travy\Schema\Fields\Input\Select;

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
