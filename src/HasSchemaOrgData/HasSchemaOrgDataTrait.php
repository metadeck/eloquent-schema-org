<?php

namespace Metadeck\EloquentSchemaOrg\HasSchemaOrgData;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Metadeck\EloquentSchemaOrg\Exceptions\JsonLdNotSet;
use Metadeck\EloquentSchemaOrg\Models\SchemaOrg;

trait HasSchemaOrgDataTrait
{
    /**
     * Set the polymorphic relation.
     *
     * @return MorphOne
     */
    public function schemaOrg()
    {
        return $this->morphOne(SchemaOrg::class, 'model');
    }

    /**
     * Set up actions for attached model events
     *
     */
    public static function bootHasSchemaOrgDataTrait()
    {
        if(config('eloquent-schema-org.generate-on-crud')) {
            static::created(function (HasSchemaOrgData $entity) {
                static::saveJsonLd($entity);
            });
            static::updated(function (HasSchemaOrgData $entity) {
                static::saveJsonLd($entity);
            });
            static::deleting(function (HasSchemaOrgData $entity) {
                static::deleteJsonLd($entity);
            });
        }
    }

    /**
     * Save the json-ld data to the model
     *
     * @param HasSchemaOrgData $entity
     */
    private static function saveJsonLd(HasSchemaOrgData $entity)
    {
        $jsonLd = $entity->toJsonLd();

        if(empty($jsonLd)) throw JsonLdNotSet::create(static::class);

        $entity->schemaOrg()->create([
            'json-ld' => $jsonLd
        ]);
    }

    /**
     * Remove the json-ld data
     *
     * @param HasSchemaOrgData $entity
     */
    private static function deleteJsonLd(HasSchemaOrgData $entity)
    {
        $entity->schemaOrg()->delete();
    }
}
