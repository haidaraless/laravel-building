<?php

namespace Structure\Project\Traits;

trait HasBuildingComponents
{
    public function prepareBuildingComponents(): void
    {
        if ($this->isResidential()) {
            $this->prepareResidentialBuilding();
        }
    }
}
