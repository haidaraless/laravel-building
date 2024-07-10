<?php

use Illuminate\Console\Command;
use Structure\Project\Commands\BuildingCommand;

use Structure\Project\Models\Building;
use Structure\Project\Models\BuildingTitle;
use Structure\Project\Models\BuildingType;
use function Pest\Laravel\artisan;

it('can create a building', function () {
    $buildingTitle = BuildingTitle::where('title', 'Private Villa')->first();
    $buildingType = BuildingType::where('name', 'Residential')->first();

    $building = Building::create([
        'land_area' => '500.0',
        'title_id' => $buildingTitle->id,
        'type_id' => $buildingType->id,
    ]);
});
