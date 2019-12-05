<?php

namespace Signifly\Travy\Schema;

use Signifly\Travy\Schema\Contracts\Config as Contract;

abstract class Config extends Definition implements Contract
{
    public function toArray()
    {
        return Schema::make([
            'frontpage' => $this->frontpage(),
            'header' => $this->header(),
            'locale' => $this->locale(),
            'theme' => $this->theme(),
            'title' => $this->title(),
        ])->toArray();
    }
}
