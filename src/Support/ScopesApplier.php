<?php

namespace Signifly\Travy\Schema\Support;

use Illuminate\Support\Arr;

class ScopesApplier
{
    public function apply(array $props, array $scopes, int $depth = 0): array
    {
        collect($scopes)->each(function ($scope, $key) use (&$props) {
            Arr::set($props, $key, Arr::prepend(Arr::get($props, $key), $scope, '@scope'));
        });

        return $props;
    }
}
