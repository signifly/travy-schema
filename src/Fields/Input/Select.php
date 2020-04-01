<?php

namespace Signifly\Travy\Schema\Fields\Input;

use Signifly\Travy\Schema\Concerns\Clearable;
use Signifly\Travy\Schema\Fields\Field;

class Select extends Field
{
    use Clearable;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-select';

    /**
     * Set the items.
     *
     * @param  array|string  $items
     * @param  bool $mapped
     * @return self
     */
    public function items($items, bool $mapped = false): self
    {
        return $this->setProp('entities', $items, $mapped);
    }

    /**
     * The options to apply to the field type.
     *
     * @return void
     */
    public function applyOptions(): void
    {
        $this->withProps(['value' => $this->attribute]);
    }
}
