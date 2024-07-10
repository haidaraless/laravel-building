<?php

namespace Structure\Project\Interfaces\Building;

interface InteractsWithComponents
{
    public function prepareBuildingComponents(): void;

    public function prepareResidentialBuilding(): void;

    public static function method($slug): string;
}
