<?php

use Structure\Project\Models\BuildingTitle;

it('has a correct title', function () {
    $buildingTitle = BuildingTitle::where('title', 'Private Villa')->first();
    $this->assertEquals('Private Villa', $buildingTitle->title);
});
