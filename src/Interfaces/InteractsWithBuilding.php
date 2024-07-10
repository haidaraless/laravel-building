<?php

namespace Structure\Project\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasOne;

interface InteractsWithBuilding
{
    public function building(): HasOne;
    public function getAllFloors(int $buildingId): array;
    public function getAllUnits(int $buildingId): array;
    public function getAllSpaces(int $buildingId): array;
}
