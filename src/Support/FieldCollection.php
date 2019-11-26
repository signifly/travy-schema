<?php

namespace Signifly\Travy\Schema\Support;

use Illuminate\Support\Collection;

class FieldCollection extends Collection
{
    /**
     * Returns the fields default value in data format.
     *
     * @return array
     */
    public function toData(): array
    {
        return $this
            ->mapWithKeys(function ($field) {
                return [$field->attribute => $field->defaultValue ?? ''];
            })
            ->toArray();
    }
}
