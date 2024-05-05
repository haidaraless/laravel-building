<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    protected $guarded = [];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function floors(): BelongsToMany
    {
        return $this->belongsToMany(Floor::class, 'floor_unit');
    }

    public function spaces(): HasMany
    {
        return $this->hasMany(Space::class);
    }
}
