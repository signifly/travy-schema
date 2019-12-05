<?php

namespace Signifly\Travy\Schema;

use Signifly\Travy\Schema\Concerns\AppliesConcerns;
use Signifly\Travy\Schema\Contracts\View as Contract;

abstract class View extends Definition implements Contract
{
    use AppliesConcerns;

    protected function preparedTabs(): array
    {
        return collect($this->tabs())
            ->map(function (Tab $tab) {
                if (! $tab->hasEndpoint()) {
                    $tab->setEndpoint($this->endpoint());
                }

                return $tab;
            })
            ->all();
    }

    public function toArray()
    {
        $schema = new Schema([
            'pageTitle' => $this->pageTitle(),
            'hero' => $this->hero(),
            'tabs' => $this->preparedTabs(),
        ]);

        $this->applyConcerns($schema);

        // Allow doing some final configurations
        if (method_exists($this, 'prepareSchema')) {
            $this->prepareSchema($schema);
        }

        return $schema->toArray();
    }
}
