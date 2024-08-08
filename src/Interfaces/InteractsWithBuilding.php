<?php

namespace Structure\Project\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasOne;

interface InteractsWithBuilding
{
    public function building(): HasOne;

    public function getAllFloors(int $buildingId): Collection;

    public function getAllUnits(int $buildingId): Collection;

    public function getAllSpaces(int $buildingId): Collection;
}
