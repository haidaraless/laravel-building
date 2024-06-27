<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Structure\Project\Actions\Floor\CrudFloor;
use Structure\Project\Traits\HasTitles;

class Floor extends Model
{
    use CrudFloor;
    use HasTitles;

    protected $guarded = [];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    public function title(): BelongsTo
    {
        return $this->belongsTo(FloorTitle::class);
    }

    public function units(): BelongsToMany
    {
        return $this->belongsToMany(Unit::class, 'floor_unit');
    }

    public function spaces(): HasMany
    {
        return $this->hasMany(Space::class);
    }
}
