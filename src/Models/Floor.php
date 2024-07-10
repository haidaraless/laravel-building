<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Structure\Project\Actions\Floor\CrudFloor;
use Structure\Project\Interfaces\Floor\InteractsWithTitle;
use Structure\Project\Traits\Floor\HasTitle;

class Floor extends Model implements InteractsWithTitle
{
    use CrudFloor;
    use HasTitle;

    protected $guarded = [];

    public function building(): BelongsTo
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
