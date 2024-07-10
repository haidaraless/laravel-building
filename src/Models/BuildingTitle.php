<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class BuildingTitle extends Model
{
    use Sushi;

    protected array $rows = [
        ['id' => 1, 'title' => 'Private Villa', 'slug' => 'private-villa', 'type' => 'residential'],
        ['id' => 2, 'title' => 'Villa and Flats', 'slug' => 'villa-and-flats', 'type' => 'residential'],
        ['id' => 3, 'title' => 'House and Flats', 'slug' => 'house-and-flats', 'type' => 'residential'],
        ['id' => 4, 'title' => 'Residential Flats', 'slug' => 'flats', 'type' => 'residential'],
    ];

    public static function privateVilla(): BuildingTitle
    {
        return BuildingTitle::query()->where('title', 'Private Villa')->first();
    }

    public static function villaAndFlats(): BuildingTitle
    {
        return BuildingTitle::query()->where('title', 'Villa and Flats')->first();
    }

    public static function houseAndFlats(): BuildingTitle
    {
        return BuildingTitle::query()->where('title', 'House and Flats')->first();
    }

    public static function residentialFlats(): BuildingTitle
    {
        return BuildingTitle::query()->where('title', 'Residential Flats')->first();
    }

    public function scopeResidential(Builder $query): void
    {
        $query->where('type', 'residential');
    }
}
