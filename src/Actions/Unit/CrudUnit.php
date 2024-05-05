<?php

namespace Structure\Project\Actions\Unit;

use Structure\Project\Exceptions\Unit\UnitException;
use Structure\Project\Models\Project;
use Structure\Project\Models\Unit;
use Structure\Project\Models\UnitTitle;

trait CrudUnit
{
    public static function add(string $title, int $projectId): void
    {
        // Find the project wants to add unit to it
        $project = Project::find($projectId);

        // Get the unit title
        $unitTitle = UnitTitle::whereTitle($title)->first();

        // If unit title is not exists, then throw an exception
        if (is_null($unitTitle)) {
            throw UnitException::titleNotExist();
        }

        // If the unit already exists, then throw an exception
        if (Unit::whereProjectId($projectId)->whereTitleId($unitTitle->id)->exists()) {
            throw UnitException::unitExists();
        }

        // Add unit to project
        $project->units()->create([
            'title_id' => $unitTitle->id,
            'order' => $unitTitle->order,
        ]);
    }

    public static function destroy(int $unitId): void
    {
        // Find unit
        $unit = Unit::with('spaces')->find($unitId);

        // If the unit is not exists then throw an exception
        if (is_null($unit)) {
            throw UnitException::unitNotExist();
        }

        // Delete its spaces if exists
        if ($unit->spaces->count() > 0) {
            foreach ($unit->spaces as $space) {
                $space->delete();
            }
        }

        // Then delete it
        $unit->delete();
    }
}
