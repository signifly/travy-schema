<?php

namespace Signifly\Travy\Schema;

use Signifly\Travy\Schema\Concerns\HasEndpoint;
use Signifly\Travy\Schema\Concerns\HasProps;
use Signifly\Travy\Schema\Support\Comparator;
use Signifly\Travy\Schema\Support\FieldCollection;

class Modal extends Action
{
    use HasEndpoint;
    use HasProps;

    /**
     * The default request method.
     *
     * @var string
     */
    protected $defaultMethod = 'post';

    /**
     * The action type.
     *
     * @return array
     */
    public function actionType(): array
    {
        $this->withProps([
            'name' => $this->name,
            'endpoint' => $this->endpoint,
        ], false);

        return Schema::make([
            'id' => 'modal',
            'props' => $this->resolveProps(),
        ])->toArray();
    }

    /**
     * Disable submit based on comparators.
     *
     * @param Comparator[] $comparators
     * @return self
     */
    public function disableSubmit(array $comparators): self
    {
        return $this->setProp('disableSubmit', $comparators, false);
    }

    /**
     * Set the fields prop.
     *
     * @param  array $fields
     * @return self
     */
    public function fields(array $fields): self
    {
        $fields = FieldCollection::make($fields);

        return $this->withProps([
            'fields' => $fields,
            'payload' => ['data' => $fields->toData()],
        ], false);
    }

    /**
     * Set the payload prop.
     *
     * @param  array $payload
     * @return self
     */
    public function payload(array $payload): self
    {
        return $this->setProp('payload', $payload, false);
    }
}
