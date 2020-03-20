<?php

namespace Signifly\Travy\Schema\Contracts;

interface Condition
{
    public function name(): string;

    public function jsonSerialize();
}
