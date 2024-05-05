<?php

namespace Structure\Project\Traits;

use Illuminate\Support\Str;
use Structure\Project\Models\Floor;
use Structure\Project\Models\FloorTitle;
use Structure\Project\Models\SpaceTitle;
use Structure\Project\Models\Unit;
use Structure\Project\Models\UnitTitle;

trait HasResidentialUnits
{
    public function prepareResidentialBuilding(): void
    {
        $method_name = $this::method($this->title->slug);

        $this::{$method_name}();
    }

    protected static function method($slug): string
    {
        return Str::replace('-', '_', $slug);
    }

    protected function private_villa(): void
    {
        $this->villa();
    }

    protected function villa(): void
    {
        // $array_name
        $ground_floor_spaces = ['صالة معيشة', 'مجلس رجال', 'مجلس نساء', 'مطبخ', 'حديقة', 'مصعد', 'درج فيلا', 'درج خدمة', 'مستودع', 'دورة مياه'];
        $first_floor_spaces = ['غرفة النوم الرئيسية', 'غرفة نوم بحمام مستقل', 'غرفة نوم', 'غرفة نوم', 'حمام مشترك'];
        $roof_deck_spaces = ['جلسة مكشوفة', 'مستودع', 'غرفة غسيل', 'دورة مياه'];

        $unit = $this->units()->create([
            'title_id' => UnitTitle::whereTitle('Villa')->first()->id,
        ]);

        $floors = Floor::with('title')->whereProjectId($this->id)->get();

        foreach ($floors as $floor) {
            $floor->units()->attach($unit);
            $array_name = ${$this::method($floor->title->slug).'_spaces'};
            $this::createSpaces($this->type->id, $floor->id, $unit->id, $array_name);
        }
    }

    protected function villa_and_flats(): void
    {
        $this->villa();

        $floors = Floor::whereProjectId($this->id)->where('title_id', '!=', FloorTitle::findBySlug('ground-floor')->id)->get();

        foreach ($floors as $floor) {
            $this->flat($floor);
        }
    }

    protected function flat(Floor $floor): void
    {
        $flat_spaces = ['صالة معيشة', 'مجلس رجال', 'مطبخ', 'دورة مياه', 'غرفة النوم الرئيسية', 'غرفة نوم'];

        $unit = Unit::create([
            'project_id' => $this->id,
            'title_id' => UnitTitle::whereTitle('Flat')->first()->id,
        ]);

        $floor->units()->attach($unit);

        foreach ($flat_spaces as $item) {
            $titleId = SpaceTitle::findByNameOfCreate($item, $this->type->id)->id;

            $unit->spaces()->create([
                'title_id' => $titleId,
                'floor_id' => $floor->id,
            ]);
        }
    }

    protected function house_and_flats(): void
    {
        $this::house();

        $floors = Floor::whereProjectId($this->id)->where('title_id', '!=', FloorTitle::findBySlug('ground-floor')->id)->get();

        foreach ($floors as $floor) {
            if ($floor->isRoofDeck()) {
                $this->flat($floor);

                return;
            }

            $this->flat($floor);
            $this->flat($floor);
        }
    }

    protected function house(): void
    {
        $ground_floor_spaces = ['صالة معيشة', 'مجلس رجال', 'مجلس نساء', 'مطبخ', 'حديقة', 'مستودع', 'دورة مياه', 'غرفة النوم الرئيسية', 'غرفة نوم', 'غرفة نوم', 'حمام مشترك', 'درج الشقق'];

        $unit = $this->units()->create(['title_id' => UnitTitle::whereTitle('House')->first()->id]);

        $floor = Floor::whereProjectId($this->id)->whereTitleId(FloorTitle::findBySlug('ground-floor')->id)->first();

        $floor->units()->attach($unit);

        $this::createSpaces($this->type->id, $floor->id, $unit->id, $ground_floor_spaces);
    }

    protected function flats(): void
    {
        $floors = Floor::whereProjectId($this->id)->get();

        foreach ($floors as $floor) {
            if ($floor->isRoofDeck()) {
                $this->flat($floor);

                return;
            }

            $this->flat($floor);
            $this->flat($floor);
        }
    }

    protected static function createSpaces(int $typeId, int $floorId, int $unitId, array $spaces): void
    {
        $floor = Floor::with('title')->whereId($floorId)->first();

        foreach ($spaces as $space) {
            $titleId = SpaceTitle::findByNameOfCreate($space, $typeId)->id;

            $floor->spaces()->create([
                'title_id' => $titleId,
                'unit_id' => $unitId,
            ]);
        }
    }
}
