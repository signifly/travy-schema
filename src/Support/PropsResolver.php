<?php

namespace Signifly\Travy\Schema\Support;

use Illuminate\Support\Str;
use Signifly\Travy\Schema\Fields\Field;

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
                } elseif ($value instanceof CustomMapping) {
                    $value = $value->getValue();
                } elseif ($value instanceof Field) {
                    // do not modify $value
                } elseif (! Str::contains('@scope', $key)) {
                    $value = '{'.$value.'}';
                }

                return [$key => $value];
            })
            ->all();
    }
}
