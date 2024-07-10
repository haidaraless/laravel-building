<?php

namespace Structure\Project\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Structure\Project\Models\Building;
use Structure\Project\Models\Floor;
use Structure\Project\Models\Space;
use Structure\Project\Models\Unit;

trait HasBuilding
{
    public function building(): HasOne
    {
        return Model::hasOne(Building::class);
    }

    public function getAllFloors(int $buildingId): array
    {
        return Floor::where('building_id', $buildingId)->get();
    }

    public function getAllUnits(int $buildingId): array
    {
        return Unit::where('building_id', $buildingId)->get();
    }

    public function getAllSpaces(int $buildingId): array
    {
        return Space::whereHas('unit', function ($query) use ($buildingId) {
            $query->where('units.building_id', $buildingId);
        })->get();
    }
}
