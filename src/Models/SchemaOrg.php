<?php

namespace Metadeck\EloquentSchemaOrg\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class SchemaOrg extends Model
{
    protected $guarded = [];

    protected $table = 'schema_org';

    /**
     * The model that this item is attached to
     * @return MorphTo
     */
    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
