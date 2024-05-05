<?php

namespace Structure\Project\Actions\Project;

use Structure\Project\Enums\ProjectTitleEnum;
use Structure\Project\Enums\ProjectTypeEnum;
use Structure\Project\Models\Project;

trait CreateProject
{
    public static function createProject(float $land_area): Project
    {
        return Project::create([
            'land_area' => $land_area,
            'title' => ProjectTitleEnum::PRIVATE_VILLA,
            'type' => ProjectTypeEnum::RESIDENTIAL,
        ]);
    }
}
