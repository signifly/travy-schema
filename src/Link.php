<?php

namespace Signifly\Travy\Schema;

use Signifly\Travy\Schema\Concerns\HasEndpoint;

class Link extends Action
{
    use HasEndpoint;

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
            ],
        ];
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
