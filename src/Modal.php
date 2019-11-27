<?php

namespace Signifly\Travy\Schema;

use Signifly\Travy\Schema\Concerns\HasEndpoint;
use Signifly\Travy\Schema\Support\FieldCollection;

class Modal extends Action
{
    use HasEndpoint;

    /**
     * The default request method.
     *
     * @var string
     */
    protected $defaultMethod = 'post';

    /**
     * The modal fields.
     *
     * @var array
     */
    protected $fields;

    /**
     * The request payload.
     *
     * @var array
     */
    protected $payload;

    /**
     * The action type.
     *
     * @return array
     */
    public function actionType(): array
    {
        $fields = FieldCollection::make($this->fields);

        return [
            'id' => 'modal',
            'props' => [
                'name' => $this->name,
                'endpoint' => $this->endpoint,
                'fields' => $fields,
                'payload' => $this->payload ?? ['data' => $fields->toData()],
            ],
        ];
    }

    /**
     * Set the fields prop.
     *
     * @param  array $fields
     * @return self
     */
    public function fields(array $fields): self
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * Set the payload prop.
     *
     * @param  array $payload
     * @return self
     */
    public function payload(array $payload): self
    {
        $this->payload = $payload;

        return $this;
    }
}
