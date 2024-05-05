<?php

namespace Structure\Project\Actions\Project;

use Structure\Project\Exceptions\Project\ProjectException;
use Structure\Project\Models\Project;
use Structure\Project\Models\ProjectTitle;
use Structure\Project\Models\ProjectType;

trait CrudProject
{
    public static function createProject(float $land_area, string $title, string $type): Project
    {
        // Get the project title
        $projectTitle = ProjectTitle::whereTitle($title)->first();

        // If project title is not exists, then throw an exception
        if (is_null($projectTitle)) {
            throw ProjectException::titleNotExist();
        }

        // Get the project type
        $projectType = ProjectType::whereType($type)->first();

        // If project type is not exists, then throw an exception
        if (is_null($projectType)) {
            throw ProjectException::typeNotExist();
        }

        return Project::create([
            'land_area' => $land_area,
            'title_id' => $projectTitle->id,
            'type_id' => $projectType->id,
        ]);
    }
}
