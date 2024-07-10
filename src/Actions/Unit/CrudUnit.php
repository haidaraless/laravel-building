<?php

namespace Structure\Project\Actions\Unit;

use Structure\Project\Exceptions\Unit\UnitException;
use Structure\Project\Models\Floor;
use Structure\Project\Models\Unit;
use Structure\Project\Models\UnitTitle;

trait CrudUnit
{
    public static function add(string $title, int $buildingId): Unit
    {
        // Get the unit title
        $unitTitle = UnitTitle::where('title', $title)->first();

        // Get count of exists units
        $count = Unit::where('building_id', $buildingId)->count();

        // If unit title is not exists, then throw an exception
        if (is_null($unitTitle)) {
            throw UnitException::titleNotExist();
        }

        // If the unit already exists, then throw an exception
        if (Unit::where('building_id', $buildingId)->where('title_id', $unitTitle->id)->exists()) {
            throw UnitException::unitExists();
        }

        // Add unit to building
        return Unit::create([
            'building_id' => $buildingId,
            'title_id' => $unitTitle->id,
            'number' => $count + 1,
        ]);
    }

    public static function addUnitToFloor(int $unitId, int $floorId): void
    {
        $unit = Unit::findById($unitId);

        $floor = Floor::findById($floorId);

        $unit->floors()->attach($floor->id);
    }

    public static function removeUnitFromFloor(int $unitId, int $floorId): void
    {
        $unit = Unit::findById($unitId);

        $floor = Floor::findById($floorId);

        $unit->floors()->detach($floor->id);
    }

    public static function remove(int $unitId): void
    {
        $unit = Unit::findById($unitId);

        // Delete its spaces if exists
        if ($unit->spaces->count() > 0) {
            foreach ($unit->spaces as $space) {
                $space->delete();
            }
        }

        $unit->delete();
    }

    public static function findById(int $unitId): Unit
    {
        $unit = Unit::find($unitId);

        if (is_null($unit)) {
            throw UnitException::unitNotExist();
        }

        return $unit;
    }
}
