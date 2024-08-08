<?php

namespace Structure\Project\Actions\Building;

use Structure\Project\Exceptions\Building\BuildingException;
use Structure\Project\Models\Building;
use Structure\Project\Models\BuildingTitle;
use Structure\Project\Models\BuildingType;

trait CrudBuilding
{
    public static function createBuilding(float $land_area, string $title, string $type_slug): Building
    {
        // Get the building title
        $buildingTitle = BuildingTitle::where('title', $title)->first();

        // If building title is not exists, then throw an exception
        if (is_null($buildingTitle)) {
            throw BuildingException::titleNotExist();
        }

        // Get the building type
        $buildingType = BuildingType::where('slug', $type_slug)->first();

        // If building type is not exists, then throw an exception
        if (is_null($buildingType)) {
            throw BuildingException::typeNotExist();
        }

        $building = Building::create([
            'land_area' => $land_area,
            'title_id' => $buildingTitle->id,
            'type_id' => $buildingType->id,
        ]);

        $building->prepareBuildingComponents();

        return $building;
    }
}
