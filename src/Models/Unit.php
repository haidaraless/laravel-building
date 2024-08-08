<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Structure\Project\Actions\Unit\CrudUnit;
use Structure\Project\Traits\Unit\HasTitle;

class Unit extends Model
{
    use CrudUnit;
    use HasTitle;

    protected $guarded = [];

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    public function title(): BelongsTo
    {
        return $this->belongsTo(UnitTitle::class);
    }

    public function floors(): BelongsToMany
    {
        return $this->belongsToMany(Floor::class, 'floor_unit');
    }

    public function spaces(): HasMany
    {
        return $this->hasMany(Space::class);
    }

    public static function getUnitNumber(int $buildingId): int
    {
        return Unit::where('building_id', $buildingId)->count() + 1;
    }
}
