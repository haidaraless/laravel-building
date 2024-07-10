<?php

namespace Structure\Project\Interfaces\Building;

use Illuminate\Database\Eloquent\Collection;
use Structure\Project\Models\Floor;

interface InteractsWithResidentialUnits
{
    public function private_villa(): void;

    public function villa(): void;

    public function villa_and_flats(): void;

    public function flat(Floor $floor): void;

    public function house_and_flats(): void;

    public function house(): void;

    public function flats(): void;

    public function createVilla(array $floors, int $unitId): void;

    public function createFlat(array $floors): void;

    public function createFlats(array $floors): void;

    public function createSpaces(array $spaces, int $typeId, int $floorId, int $unitId): void;
}
