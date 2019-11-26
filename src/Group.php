<?php

namespace Signifly\Travy\Schema;

use JsonSerializable;
use Signifly\Travy\Schema\Concerns\Instantiable;
use Signifly\Travy\Schema\Support\FieldCollection;

class Group implements JsonSerializable
{
    use Instantiable;

    /**
     * The displayable name of the tab.
     *
     * @var string
     */
    protected $name;

    /**
     * The fields in the tab.
     *
     * @var array
     */
    protected $fields;

    /**
     * Create a new tab.
     *
     * @param string $name
     */
    public function __construct($name, array $fields = [])
    {
        $this->name = $name;
        $this->fields = $fields;
    }

    /**
     * Set the fields in the tab.
     *
     * @param  array  $fields
     * @return self
     */
    public function fields(array $fields): self
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * Prepare the sidebar for JSON serialization.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'fields' => FieldCollection::make($this->fields)->jsonSerialize(),
        ];
    }
}
