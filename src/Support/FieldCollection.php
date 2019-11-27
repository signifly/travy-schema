<?php

namespace Signifly\Travy\Schema\Support;

use Illuminate\Support\Collection;
use Signifly\Travy\Schema\Fields\Field;

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
            ->mapWithKeys(function (Field $field) {
                return [$field->attribute => $field->defaultValue ?? ''];
            })
            ->toArray();
    }
}
