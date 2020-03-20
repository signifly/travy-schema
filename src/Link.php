<?php

namespace Signifly\Travy\Schema;

use Signifly\Travy\Schema\Concerns\HasEndpoint;

class Link extends Action
{
    use HasEndpoint;

    /**
     * Whether the link is external.
     *
     * @var bool
     */
    protected $external = false;

    /**
     * The URL to link to.
     *
     * @var string
     */
    protected $url;

    /**
     * The action type.
     *
     * @return array
     */
    public function actionType(): array
    {
        return [
            'id' => 'link',
            'props' => [
                'url' => $this->url,
                'external' => $this->external,
            ],
        ];
    }

    /**
     * Set the external property.
     *
     * @param  bool $value
     * @return self
     */
    public function external(bool $value = true): self
    {
        $this->external = $value;

        return $this;
    }

    /**
     * Set the url.
     *
     * @param  string $url
     * @return self
     */
    public function url(string $url): self
    {
        $this->url = $url;

        return $this;
    }
}
