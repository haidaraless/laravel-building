<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class BuildingType extends Model
{
    use Sushi;

    protected $rows = [
        ['id' => 1, 'name' => 'Residential', 'slug' => 'residential'],
        ['id' => 2, 'name' => 'Commercial', 'slug' => 'commercial'],
        ['id' => 3, 'name' => 'Managerial', 'slug' => 'managerial'],
        ['id' => 4, 'name' => 'Residential Commercial', 'slug' => 'residential-commercial'],
        ['id' => 5, 'name' => 'Commercial Managerial', 'slug' => 'commercial-managerial'],
    ];

    public static function residential(): BuildingType
    {
        return BuildingType::query()->where('name', 'Residential')->first();
    }

    public static function commercial(): BuildingType
    {
        return BuildingType::query()->where('name', 'Commercial')->first();
    }

    public static function managerial(): BuildingType
    {
        return BuildingType::query()->where('name', 'Managerial')->first();
    }

    public static function residentialCommercial(): BuildingType
    {
        return BuildingType::query()->where('name', 'Residential Commercial')->first();
    }

    public static function commercialManagerial(): BuildingType
    {
        return BuildingType::query()->where('name', 'Commercial Managerial')->first();
    }
}
