<?php

use Structure\Project\Models\BuildingType;

it('has a correct type name', function () {
    $buildingType = BuildingType::where('name', 'Residential')->first();
    $this->assertEquals('Residential', $buildingType->name);
});
