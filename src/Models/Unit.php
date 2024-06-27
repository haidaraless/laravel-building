<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Structure\Project\Actions\Unit\CrudUnit;

class Unit extends Model
{
    use CrudUnit;

    protected $guarded = [];

    public function project(): BelongsTo
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

    public static function getUnitNumber(int $projectId): int
    {
        return Unit::whereProjectId($projectId)->count() + 1;
    }
}
