<?php

namespace Signifly\Travy\Schema\Support;

use Illuminate\Support\Str;

class PropsResolver
{
    /**
     * Resolve the props.
     *
     * @param  array  $props
     * @return array
     */
    public function resolve(array $props): array
    {
        return collect($props)
            ->mapWithKeys(function ($value, $key) {
                if (is_array($value)) {
                    $value = $this->resolve($value);
                } elseif ($value instanceof UnmappedProp) {
                    $key = "{$key}";
                    $value = $value->getValue();
                } elseif (! Str::contains('@scope', $key)) {
                    $value = '{'.$value.'}';
                }

                return [$key => $value];
            })
            ->all();
    }
}
