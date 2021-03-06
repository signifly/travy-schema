<?php

namespace Signifly\Travy\Schema;

use Signifly\Travy\Schema\Concerns\AppliesConcerns;
use Signifly\Travy\Schema\Contracts\Index as Contract;

abstract class Index extends Definition implements Contract
{
    use AppliesConcerns;

    public function toSchema(): Schema
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

        return $schema;
    }

    public function toArray()
    {
        return $this->toSchema()->toArray();
    }
}
