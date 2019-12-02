<?php

namespace Signifly\Travy\Schema\Concerns;

use Signifly\Travy\Schema\Sidebar;

interface WithSidebar
{
    public function sidebar(): Sidebar;
}
