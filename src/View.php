<?php

namespace Signifly\Travy\Schema;

use Signifly\Travy\Schema\Concerns\AppliesConcerns;
use Signifly\Travy\Schema\Concerns\WithEndpoint;
use Signifly\Travy\Schema\Contracts\View as Contract;

abstract class View extends Definition implements Contract, WithEndpoint
{
    use AppliesConcerns;

    abstract public function pageTitle(): string;

    abstract public function hero(): array;

    public function toArray()
    {
        $schema = new Schema([
            'pageTitle' => $this->pageTitle(),
            'hero' => $this->hero(),
            'tabs' => $this->tabs(),
        ]);

        $this->applyConcerns($schema);

        // Allow doing some final configurations
        if (method_exists($this, 'prepareSchema')) {
            $this->prepareSchema($schema);
        }

        return $schema->toArray();
    }
}
