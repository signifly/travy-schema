<?php

namespace Signifly\Travy\Schema\Exceptions;

use Exception;

class InvalidDefinitionException extends Exception
{
    public static function for($type): self
    {
        return new self(
            sprintf('Invalid tab type `%s` defined', $type)
        );
    }
}
