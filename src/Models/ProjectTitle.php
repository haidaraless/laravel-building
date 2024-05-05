<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class ProjectTitle extends Model
{
    use Sushi;

    protected $rows = [
        ['id' => 1, 'title' => 'Private Villa', 'slug' => 'private-villa', 'type' => 'residential'],
        ['id' => 2, 'title' => 'Villa and Flats', 'slug' => 'villa-and-flats', 'type' => 'residential'],
        ['id' => 3, 'title' => 'House and Flats', 'slug' => 'house-and-flats', 'type' => 'residential'],
        ['id' => 4, 'title' => 'Residential Flats', 'slug' => 'flats', 'type' => 'residential'],
    ];

    public static function privateVilla(): ProjectTitle
    {
        return ProjectTitle::query()->whereTitle('Private Villa')->first();
    }

    public static function villaAndFlats(): ProjectTitle
    {
        return ProjectTitle::query()->whereTitle('Villa and Flats')->first();
    }

    public static function houseAndFlats(): ProjectTitle
    {
        return ProjectTitle::query()->whereTitle('House and Flats')->first();
    }

    public static function residentialFlats(): ProjectTitle
    {
        return ProjectTitle::query()->whereTitle('Residential Flats')->first();
    }

    public function scopeResidential(Builder $query): void
    {
        $query->where('type', 'residential');
    }
}
