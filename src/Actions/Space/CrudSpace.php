<?php

namespace Structure\Project\Actions\Space;

use Structure\Project\Exceptions\Space\SpaceException;
use Structure\Project\Models\Space;
use Structure\Project\Models\SpaceTitle;

trait CrudSpace
{
    public static function add(string $title, int $typeId, int $floorId, int $unitId): void
    {
        $titleId = SpaceTitle::findByNameOrCreate($title, $typeId)->id;

        Space::create([
            'title_id' => $titleId,
            'floor_id' => $floorId,
            'unit_id' => $unitId,
        ]);
    }

    public static function remove(int $spaceId): void
    {
        $space = Space::findById($spaceId);

        $space->delete();
    }

    public static function findById(int $spaceId): Space
    {
        $space = Space::find($spaceId);

        if (is_null($space)) {
            throw SpaceException::spaceNotExist();
        }

        return $space;
    }
}
