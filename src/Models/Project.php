<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Structure\Project\Actions\Project\CreateProject;
use Structure\Project\Interfaces\HasTypeInterface;
use Structure\Project\Traits\HasType;
use Sushi\Sushi;

class Project extends Model implements HasTypeInterface
{
    use HasType;
    use CreateProject;

    protected $guarded = [];

    public function title(): BelongsTo
    {
        return $this->belongsTo(ProjectTitle::class, 'title_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(ProjectType::class, 'type_id');
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
