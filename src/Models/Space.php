<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Structure\Project\Actions\Space\CrudSpace;
use Structure\Project\Traits\Space\HasName;

class Space extends Model
{
    use CrudSpace;
    use HasName;

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
        return $this->belongsTo(SpaceTitle::class, 'title_id');
    }
}
