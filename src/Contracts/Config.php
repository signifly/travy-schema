<?php

namespace Signifly\Travy\Schema\Contracts;

use Signifly\Travy\Schema\Header;
use Signifly\Travy\Schema\Theme;

interface Config
{
    public function frontpage(): string;

    public function header(): Header;

    public function locale(): string;

    public function title(): string;

    public function theme(): Theme;
}
