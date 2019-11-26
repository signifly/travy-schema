<?php

namespace Signifly\Travy\Schema;

use JsonSerializable;
use Signifly\Travy\Concerns\Instantiable;

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
     * The sidebar sections.
     *
     * @var array
     */
    protected $sections;

    /**
     * Create a new tab.
     *
     * @param string $name
     */
    public function __construct($name, array $sections)
    {
        $this->name = $name;
        $this->sections = $sections;
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
            'sections' => collect($this->sections)->jsonSerialize(),
        ];
    }
}
