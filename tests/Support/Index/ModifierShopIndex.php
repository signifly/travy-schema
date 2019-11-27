<?php

namespace Signifly\Travy\Schema\Tests\Support\Index;

use Signifly\Travy\Schema\Concerns\WithModifiers;
use Signifly\Travy\Schema\Fields\Text;

class ModifierShopIndex extends ShopIndex implements WithModifiers
{
    public function modifiers(): array
    {
        return [
            Text::make('Shop')->asInput(),
        ];
    }
}
