<?php

namespace Signifly\Travy\Schema;

use JsonSerializable;
use Signifly\Travy\Schema\Concerns\Instantiable;

/** @method static static make($name, array $groups) */
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
     * Prepare the groups for JSON serialization.
     *
     * @return array
     */
    protected function preparedGroups(): array
    {
        return collect($this->groups)
            ->map(function (Group $group) {
                return $group->jsonSerialize();
            })
            ->all();
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
            'groups' => $this->preparedGroups(),
        ];
    }
}
