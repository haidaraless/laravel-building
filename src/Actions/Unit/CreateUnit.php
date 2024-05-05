<?php

namespace Structure\Project\Actions\Unit;

use Structure\Project\Models\Unit;
use Structure\Project\Models\UnitTitle;

trait CreateUnit
{
    protected function createUnit(int $projectId, string $title): Unit
    {
        return Unit::create([
            'project_id' => $projectId,
            'title_id' => UnitTitle::${$title}->id,
            'number' => Unit::getUnitNumber($projectId)
        ]);
    }
}
