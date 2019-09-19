<?php

namespace Metadeck\EloquentSchemaOrg\Exceptions;

use Exception;

class JsonLdNotSet extends Exception
{
    public static function create(string $modelName)
    {
        return new static("`{$modelName}` returned empty json ld object.");
    }
}
