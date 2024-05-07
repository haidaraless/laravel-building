<?php

namespace Structure\Project\Actions\Floor;

use Structure\Project\Exceptions\Floor\FloorException;
use Structure\Project\Models\Floor;
use Structure\Project\Models\FloorTitle;

trait CrudFloor
{
    public static function add(string $title, int $projectId): Floor
    {
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
        return Floor::create([
            'project_id' => $projectId,
            'title_id' => $floorTitle->id,
            'order' => $floorTitle->order,
        ]);
    }

    public static function destroy(int $floorId): void
    {
        $floor = Floor::findById($floorId);

        // Delete its spaces if exists
        if ($floor->spaces->count() > 0) {
            foreach ($floor->spaces as $space) {
                $space->delete();
            }
        }

        $floor->delete();
    }

    public static function findById(int $floorId): Floor
    {
        $floor = Floor::find($floorId);

        if (is_null($floor)) {
            throw FloorException::floorNotExist();
        }

        return $floor;
    }

    public static function findByTitle(int $projectId, string $title): ?Floor
    {
        return Floor::whereProjectId($projectId)->whereTitleId(FloorTitle::findBySlug($title)->id)->first();
    }

    public static function getAllFloors(int $projectId): array
    {
        return Floor::with('title')->whereProjectId($projectId)->get();
    }

    public static function getFloorsExcept(int $projectId, string $title)
    {
        return Floor::whereProjectId($projectId)->where('title_id', '!=', FloorTitle::findBySlug($title)->id)->get();
    }
}
