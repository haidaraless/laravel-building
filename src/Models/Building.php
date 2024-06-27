<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Structure\Project\Actions\Building\CrudBuilding;
use Structure\Project\Traits\HasBuildingComponents;
use Structure\Project\Traits\HasCommercialUnits;
use Structure\Project\Traits\HasManagerialUnits;
use Structure\Project\Traits\HasResidentialUnits;
use Structure\Project\Traits\HasTypes;

class Building extends Model
{
    use CrudBuilding;
    use HasBuildingComponents;
    use HasCommercialUnits;
    use HasManagerialUnits;
    use HasResidentialUnits;
    use HasTypes;

    protected $guarded = [];

    public function title(): BelongsTo
    {
        return $this->belongsTo(BuildingTitle::class, 'title_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(BuildingType::class, 'type_id');
    }

    public function floors(): HasMany
    {
        return $this->hasMany(Floor::class);
    }

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    public function spaces(): HasManyThrough
    {
        return $this->hasManyThrough(Space::class, Floor::class);
    }
}
