<?php

namespace Structure\Project\Actions\Floor;

use Structure\Project\Exceptions\Floor\FloorException;
use Structure\Project\Models\Floor;
use Structure\Project\Models\FloorTitle;

trait CrudFloor
{
    public static function add(string $title, int $buildingId): Floor
    {
        // Get the floor title
        $floorTitle = FloorTitle::where('title', $title)->first();

        // If floor title is not exists, then throw an exception
        if (is_null($floorTitle)) {
            throw FloorException::titleNotExist();
        }

        // If the floor already exists, then throw an exception
        if (Floor::where('building_id', $buildingId)->where('title_id', $floorTitle->id)->exists()) {
            throw FloorException::floorExists();
        }

        // Add floor to building
        return Floor::create([
            'building_id' => $buildingId,
            'title_id' => $floorTitle->id,
            'order' => $floorTitle->order,
        ]);
    }

    public static function remove(int $floorId): void
    {
        $floor = Floor::findById($floorId);

        // Delete its spaces if exists
        if ($floor->spaces->count() > 0) {
            foreach ($floor->spaces as $space) {
                $space->delete();
            }
        }

        $floor->delete();
    }

    public static function findById(int $floorId): Floor
    {
        $floor = Floor::find($floorId);

        if (is_null($floor)) {
            throw FloorException::floorNotExist();
        }

        return $floor;
    }

    public static function findByTitle(int $buildingId, string $title): ?Floor
    {
        return Floor::where('building_id', $buildingId)->where('title_id', FloorTitle::findBySlug($title)->id)->first();
    }

    public static function getAllFloors(int $buildingId): array
    {
        return Floor::with('title')->where('building_id', $buildingId)->get();
    }

    public static function getFloorsExcept(int $buildingId, string $title)
    {
        return Floor::where('building_id', $buildingId)->where('title_id', '!=', FloorTitle::findBySlug($title)->id)->get();
    }
}
