<?php

namespace Structure\Project\Actions\Project;

use Structure\Project\Models\Project;
use Structure\Project\Models\ProjectTitle;
use Structure\Project\Models\ProjectType;

trait CreateProject
{
    public static function createProject(float $land_area, string $title, string $type): Project
    {
        return Project::create([
            'land_area' => $land_area,
            'title_id' => ProjectTitle::${$title}->id,
            'type_id' => ProjectType::${$type}->id,
        ]);
    }
}
