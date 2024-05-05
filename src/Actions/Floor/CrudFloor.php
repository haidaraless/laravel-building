<?php

namespace Structure\Project\Actions\Floor;

use Structure\Project\Exceptions\Floor\FloorException;
use Structure\Project\Models\Floor;
use Structure\Project\Models\FloorTitle;
use Structure\Project\Models\Project;

trait CrudFloor
{
    public static function add(string $title, int $projectId): void
    {
        // Find the project wants to add floor to it
        $project = Project::find($projectId);

        // Get the floor title
        $floorTitle = FloorTitle::whereTitle($title)->first();

        // If floor title is not exists, then throw an exception
        if (is_null($floorTitle)) {
            throw FloorException::titleNotExist();
        }

        // If the floor already exists, then throw an exception
        if (Floor::whereProjectId($projectId)->whereTitleId($floorTitle->id)->exists()) {
            throw FloorException::floorExists();
        }

        // Add floor to project
        $project->floors()->create([
            'title_id' => $floorTitle->id,
            'order' => $floorTitle->order,
        ]);
    }

    public static function destroy(int $floorId): void
    {
        // Find floor
        $floor = Floor::with('spaces')->find($floorId);

        // If the floor is not exists then throw an exception
        if (is_null($floor)) {
            throw FloorException::floorNotExist();
        }

        // Delete its spaces if exists
        if ($floor->spaces->count() > 0) {
            foreach ($floor->spaces as $space) {
                $space->delete();
            }
        }

        // Then delete it
        $floor->delete();
    }
}
