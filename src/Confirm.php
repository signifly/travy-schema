<?php

namespace Signifly\Travy\Schema;

use Signifly\Travy\Schema\Concerns\HasEndpoint;

class Confirm extends Action
{
    use HasEndpoint;

    /**
     * The default request method.
     *
     * @var string
     */
    protected $defaultMethod = 'post';

    /**
     * The request payload.
     *
     * @var array
     */
    protected $payload;

    /**
     * The text to display in the popup.
     *
     * @var string
     */
    protected $text;

    /**
     * The action type.
     *
     * @return array
     */
    public function actionType(): array
    {
        return [
            'id' => 'confirm',
            'props' => [
                'title' => $this->name,
                'text' => $this->text ?? $this->defaultText(),
                'endpoint' => $this->endpoint,
                'payload' => $this->payload ?? (object) [],
            ],
        ];
    }

    /**
     * Set the payload prop.
     *
     * @param  array $value
     * @return self
     */
    public function payload(array $value): self
    {
        $this->payload = $value;

        return $this;
    }

    /**
     * Set the text prop.
     *
     * @param  string $value
     * @return self
     */
    public function text(string $value): self
    {
        $this->text = $value;

        return $this;
    }

    /**
     * The default text to display in the popup.
     *
     * @todo Refactor to language files
     * @return string
     */
    public function defaultText(): string
    {
        return 'Are you sure? Please confirm this action.';
    }
}
