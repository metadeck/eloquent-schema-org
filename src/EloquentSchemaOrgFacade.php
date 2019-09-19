<?php

namespace Metadeck\EloquentSchemaOrg;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Metadeck\EloquentJsonLd\Skeleton\SkeletonClass
 */
class EloquentSchemaOrgFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'eloquent-schema-org';
    }
}
