<?php

namespace Structure\Project\Actions\Floor;

use Structure\Project\Models\Floor;
use Structure\Project\Models\FloorTitle;

trait CreateFloor
{
    protected function createFloor(int $projectId, string $title): Floor
    {
        return Floor::create([
            'project_id' => $projectId,
            'title_id' => FloorTitle::${$title}->id,
            'order' => FloorTitle::${$title}->order,
        ]);
    }
}
