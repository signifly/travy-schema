<?php

namespace Signifly\Travy\Concerns;

use Signifly\Travy\Schema\Sidebar;

interface WithSidebar
{
    public function sidebar(): Sidebar;
}
