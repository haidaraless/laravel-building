<?php

namespace Structure\Project\Traits;

use Illuminate\Support\Str;
use Structure\Project\Models\Floor;
use Structure\Project\Models\Space;
use Structure\Project\Models\Unit;

trait HasResidentialUnits
{
    protected function private_villa(): void
    {
        $this->villa();
    }

    protected function villa(): void
    {
        $unit = Unit::add('Villa', $this->id);

        $floors = Floor::getAllFloors($this->id);

        $this->createVilla($floors, $unit->id);
    }

    protected function villa_and_flats(): void
    {
        $this->villa();

        $floors = Floor::getFloorsExcept($this->id, 'ground-floor');

        $this->createFlat($floors);
    }

    protected function flat(Floor $floor): void
    {
        $flat_spaces = ['صالة معيشة', 'مجلس رجال', 'مطبخ', 'دورة مياه', 'غرفة النوم الرئيسية', 'غرفة نوم'];

        $unit = Unit::add('Flat', $this->id);

        Unit::addUnitToFloor($unit->id, $floor->id);

        $this->createSpaces($flat_spaces, $this->type->id, $floor->id, $unit->id);
    }

    protected function house_and_flats(): void
    {
        $this->house();

        $floors = Floor::getFloorsExcept($this->id, 'ground-floor');

        $this->createFlats($floors);
    }

    protected function house(): void
    {
        $ground_floor_spaces = ['صالة معيشة', 'مجلس رجال', 'مجلس نساء', 'مطبخ', 'حديقة', 'مستودع', 'دورة مياه', 'غرفة النوم الرئيسية', 'غرفة نوم', 'غرفة نوم', 'حمام مشترك', 'درج الشقق'];

        $floor = Floor::findByTitle($this->id, 'ground-floor');

        $unit = Unit::add('House', $this->id);

        Unit::addUnitToFloor($unit->id, $floor->id);

        $this->createSpaces($ground_floor_spaces, $this->type->id, $floor->id, $unit->id);
    }

    protected function flats(): void
    {
        $floors = Floor::getAllFloors($this->id);

        $this->createFlats($floors);
    }

    protected function createVilla(array $floors, int $unitId): void
    {
        // $array_name
        $ground_floor_spaces = ['صالة معيشة', 'مجلس رجال', 'مجلس نساء', 'مطبخ', 'حديقة', 'مصعد', 'درج فيلا', 'درج خدمة', 'مستودع', 'دورة مياه'];
        $first_floor_spaces = ['غرفة النوم الرئيسية', 'غرفة نوم بحمام مستقل', 'غرفة نوم', 'غرفة نوم', 'حمام مشترك'];
        $roof_deck_spaces = ['جلسة مكشوفة', 'مستودع', 'غرفة غسيل', 'دورة مياه'];

        foreach ($floors as $floor) {

            Unit::addUnitToFloor($unitId, $floor->id);

            $array_name = ${$this::method($floor->title->slug).'_spaces'};

            $this->createSpaces($array_name, $this->type->id, $floor->id, $unitId);
        }
    }

    protected function createFlat(array $floors): void
    {
        foreach ($floors as $floor) {
            $this->flat($floor);
        }
    }

    protected function createFlats(array $floors): void
    {
        foreach ($floors as $floor) {

            if ($floor->isRoofDeck()) {
                $this->flat($floor);
                return;
            }

            $this->flat($floor);
            $this->flat($floor);
        }
    }

    protected function createSpaces(array $spaces, int $typeId, int $floorId, int $unitId): void
    {
        foreach ($spaces as $space) {
            Space::add($space, $typeId, $floorId, $unitId);
        }
    }
}
