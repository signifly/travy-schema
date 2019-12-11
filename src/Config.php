<?php

namespace Signifly\Travy\Schema;

use Signifly\Travy\Schema\Contracts\Config as Contract;

abstract class Config extends Definition implements Contract
{
    public function toArray()
    {
        $schema = Schema::make([
            'frontpage' => $this->frontpage(),
            'header' => $this->header(),
            'locale' => $this->locale(),
            'theme' => $this->theme(),
            'title' => $this->title(),
        ]);

        if (isset($this->websocketUrl)) {
            $schema->set('websockets', $this->websocketUrl);
        }

        return $schema->toArray();
    }
}
