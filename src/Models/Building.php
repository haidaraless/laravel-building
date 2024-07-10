<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Structure\Project\Actions\Building\CrudBuilding;
use Structure\Project\Interfaces\Building\InteractsWithComponents;
use Structure\Project\Interfaces\Building\InteractsWithResidentialUnits;
use Structure\Project\Interfaces\Building\InteractsWithType;
use Structure\Project\Traits\Building\HasCommercialUnits;
use Structure\Project\Traits\Building\HasComponents;
use Structure\Project\Traits\Building\HasManagerialUnits;
use Structure\Project\Traits\Building\HasResidentialUnits;
use Structure\Project\Traits\Building\HasType;

class Building extends Model implements InteractsWithComponents, InteractsWithResidentialUnits, InteractsWithType
{
    use CrudBuilding;
    use HasCommercialUnits;
    use HasComponents;
    use HasManagerialUnits;
    use HasResidentialUnits;
    use HasType;

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
