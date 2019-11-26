<?php

namespace Signifly\Travy\Schema;

use JsonSerializable;
use Signifly\Travy\Schema\Concerns\Instantiable;

class Sidebar implements JsonSerializable
{
    use Instantiable;

    /**
     * The displayable name of the tab.
     *
     * @var string
     */
    protected $name;

    /**
     * The sidebar groups.
     *
     * @var array
     */
    protected $groups;

    /**
     * Create a new tab.
     *
     * @param string $name
     */
    public function __construct($name, array $groups)
    {
        $this->name = $name;
        $this->groups = $groups;
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
            'groups' => collect($this->groups)->jsonSerialize(),
        ];
    }
}
