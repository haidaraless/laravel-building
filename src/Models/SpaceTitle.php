<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpaceTitle extends Model
{
    protected $guarded = [];

    public function type(): BelongsTo
    {
        return $this->belongsTo(ProjectType::class, 'type_id');
    }

    public static function findByNameOfCreate(string $name, int $typeId): SpaceTitle
    {
        $title = SpaceTitle::whereName($name)->whereTypeId($typeId)->first();

        if (is_null($title)) {
            $title = SpaceTitle::create([
                'name' => $name,
                'type_id' => $typeId,
            ]);
        }

        return $title;
    }
}
