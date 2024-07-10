<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpaceTitle extends Model
{
    protected $guarded = [];

    public function type(): BelongsTo
    {
        return $this->belongsTo(BuildingType::class, 'type_id');
    }

    public static function findByNameOrCreate(string $name, int $typeId): SpaceTitle
    {
        $title = SpaceTitle::where('name', $name)->where('type_id', $typeId)->first();

        if (is_null($title)) {
            $title = SpaceTitle::create([
                'name' => $name,
                'type_id' => $typeId,
            ]);
        }

        return $title;
    }
}
