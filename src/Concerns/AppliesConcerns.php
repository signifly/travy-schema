<?php

namespace Signifly\Travy\Schema\Concerns;

use Signifly\Travy\Schema\Schema;
use Signifly\Travy\Schema\Support\FieldCollection;

/**
 * @internal
 */
trait AppliesConcerns
{
    protected function applyConcerns(Schema $schema): void
    {
        foreach (class_implements($this) as $interface) {
            $method = 'apply'.class_basename($interface);

            if (method_exists($this, $method)) {
                $this->$method($schema);
            }
        }
    }

    protected function applyWithActions(Schema $schema): void
    {
        $schema->set('actions', $this->actions());
    }

    protected function applyWithActivity(Schema $schema): void
    {
        $schema->set('activity', $this->activity());
    }

    protected function applyWithBatchActions(Schema $schema): void
    {
        $schema->set('batch', $this->batch());
    }

    protected function applyWithChannel(Schema $schema): void
    {
        $schema->set('ws.channel', $this->channel());
    }

    protected function applyWithDefaults(Schema $schema): void
    {
        $schema->set('defaults', $this->defaults());
    }

    protected function applyWithEndpoint(Schema $schema): void
    {
        $schema->set('endpoint', $this->endpoint());
    }

    protected function applyWithExpand(Schema $schema): void
    {
        $schema->set('expand', $this->expand());
    }

    protected function applyWithFilters(Schema $schema): void
    {
        $filters = FieldCollection::make($this->filters());

        $schema->set('filters.data', $filters->toData());
        $schema->set('filters.fields', $filters->jsonSerialize());
    }

    protected function applyWithModifiers(Schema $schema): void
    {
        $modifiers = FieldCollection::make($this->modifiers());

        $schema->set('modifiers', [
            'data' => $modifiers->toData(),
            'fields' => $modifiers->jsonSerialize(),
        ]);
    }

    protected function applyWithPagination(Schema $schema): void
    {
        $schema->set('pagination', (object) []);
    }

    protected function applyWithRow(Schema $schema): void
    {
        $schema->set('row', $this->row());
    }

    protected function applyWithSearch(Schema $schema): void
    {
        $schema->set('filters.search.placeholder', $this->searchPlaceholder());
    }

    protected function applyWithSidebar(Schema $schema): void
    {
        $schema->set('sidebar', $this->sidebar());
    }

    protected function applyWithSorting(Schema $schema): void
    {
        $schema->set('sort', $this->sort());
    }

    protected function applyWithWebsockets(Schema $schema): void
    {
        $schema->set('websockets', $this->websockets());
    }
}
