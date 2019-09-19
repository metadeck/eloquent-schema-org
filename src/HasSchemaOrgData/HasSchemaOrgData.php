<?php

namespace Metadeck\EloquentSchemaOrg\HasSchemaOrgData;

interface HasSchemaOrgData
{
    /**
     * Set the polymorphic relation.
     *
     * @return mixed
     */
    public function schemaOrg();

    /**
     * Return the json-ld representation of the model
     *
     * @return mixed
     */
    public function toJsonLd();
}
