<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Space extends Model
{
    protected $guarded = [];

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function floor(): BelongsTo
    {
        return $this->belongsTo(Floor::class);
    }

    public function title(): BelongsTo
    {
        return $this->belongsTo(SpaceTitle::class);
    }
}
