<?php

namespace Structure\Project\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Structure\Project\Models\Building;

trait HasBuilding
{
    public function building(): HasOne
    {
        return Model::hasOne(Building::class);
    }
}
