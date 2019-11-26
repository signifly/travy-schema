<?php

namespace Signifly\Travy\Schema;

use Signifly\Travy\Schema\Contracts\Dashboard as Contract;

class Dashboard extends Definition implements Contract
{
    /** @var array */
    protected $sections;

    public function __construct(array $sections = [])
    {
        $this->sections = $sections;
    }

    public function sections(): array
    {
        return $this->sections;
    }

    public function toArray()
    {
        $sections = collect($this->sections())
            ->jsonSerialize();

        return compact('sections');
    }
}
