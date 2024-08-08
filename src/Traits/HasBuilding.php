<?php

namespace Structure\Project\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Structure\Project\Models\Building;
use Structure\Project\Models\Floor;
use Structure\Project\Models\Space;
use Structure\Project\Models\Unit;

trait HasBuilding
{
    public function building(): BelongsTo
    {
        return Model::belongsTo(Building::class);
    }

    public function getAllFloors(int $buildingId): Collection
    {
        return Floor::where('building_id', $buildingId)->get();
    }

    public function getAllUnits(int $buildingId): Collection
    {
        return Unit::where('building_id', $buildingId)->get();
    }

    public function getAllSpacesOf(int $unitId, int $floorId): Collection
    {
        return Space::whereUnitId($unitId)->whereFloorId($floorId)->get();
    }

    public function getAllSpaces(int $buildingId): Collection
    {
        return Space::whereHas('unit', function ($query) use ($buildingId) {
            $query->where('units.building_id', $buildingId);
        })->get();
    }
}
