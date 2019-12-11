<?php

namespace Signifly\Travy\Schema;

use Signifly\Travy\Schema\Concerns\AppliesConcerns;
use Signifly\Travy\Schema\Contracts\Config as Contract;

abstract class Config extends Definition implements Contract
{
    use AppliesConcerns;

    public function toArray()
    {
        $schema = Schema::make([
            'frontpage' => $this->frontpage(),
            'header' => $this->header(),
            'locale' => $this->locale(),
            'theme' => $this->theme(),
            'title' => $this->title(),
        ]);

        $this->applyConcerns($schema);

        // Allow doing some final configurations
        if (method_exists($this, 'prepareSchema')) {
            $this->prepareSchema($schema);
        }

        return $schema->toArray();
    }
}
