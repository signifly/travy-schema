<?php

namespace Signifly\Travy\Schema;

use Signifly\Travy\Schema\Concerns\AppliesConcerns;
use Signifly\Travy\Schema\Contracts\Table as Contract;

abstract class Table extends Definition implements Contract
{
    use AppliesConcerns;

    public function toSchema(): Schema
    {
        $schema = new Schema([
            'columns' => $this->columns(),
            'endpoint' => $this->endpoint(),
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
