<?php

namespace Signifly\Travy\Schema;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;
use JsonSerializable;
use Signifly\Travy\Schema\Concerns\Instantiable;

/** @method static static make(string $label, ?string $value = null, bool $manual = false) */
class SortItem implements Arrayable, JsonSerializable
{
    use Instantiable;

    /**
     * Whether the sort item is default.
     *
     * @var bool
     */
    protected $default = false;

    /**
     * The sort item label.
     *
     * @var string
     */
    protected $label;

    /**
     * Whether the sort item enables manual sorting.
     *
     * @var bool
     */
    protected $manual = false;

    /**
     * The sort item value.
     *
     * @var string
     */
    protected $value;

    public function __construct(string $label, ?string $value = null, bool $manual = false)
    {
        $this->label = $label;
        $this->value = $value ?? Str::slug($label, '_');
        $this->manual = false;
    }

    /**
     * Set the sort item as default sorting.
     *
     * @param  bool $default
     * @return self
     */
    public function default(bool $default = true): self
    {
        $this->default = $default;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->default;
    }

    /**
     * @return bool
     */
    public function isManual(): bool
    {
        return $this->manual;
    }

    /**
     * Enable manual sorting for this sort item.
     *
     * @param  bool $manual
     * @return self
     */
    public function manual(bool $manual = true): self
    {
        $this->manual = $manual;

        return $this;
    }

    /**
     * Get the sort item value.
     *
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray()
    {
        return [
            'label' => $this->label,
            'value' => $this->value,
            'manual' => $this->manual,
        ];
    }
}
