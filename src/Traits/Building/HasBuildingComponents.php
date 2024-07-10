<?php

namespace Structure\Project\Traits\Building;

use Illuminate\Support\Str;

trait HasBuildingComponents
{
    public function prepareBuildingComponents(): void
    {
        if ($this->isResidential()) {
            $this->prepareResidentialBuilding();
        }
    }

    public function prepareResidentialBuilding(): void
    {
        $method_name = $this::method($this->title->slug);

        $this::{$method_name}();
    }

    public static function method($slug): string
    {
        return Str::replace('-', '_', $slug);
    }
}
