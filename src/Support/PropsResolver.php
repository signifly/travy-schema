<?php

namespace Signifly\Travy\Schema\Support;

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
                    $key = "_{$key}";
                    $value = $value->getValue();
                }

                return [$key => $value];
            })
            ->all();
    }
}
