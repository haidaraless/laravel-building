<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class ProjectType extends Model
{
    use Sushi;

    protected $rows = [
        ['id' => 1, 'name' => 'Residential', 'slug' => 'residential'],
        ['id' => 2, 'name' => 'Commercial', 'slug' => 'commercial'],
        ['id' => 3, 'name' => 'Managerial', 'slug' => 'managerial'],
        ['id' => 4, 'name' => 'Residential Commercial', 'slug' => 'residential-commercial'],
        ['id' => 5, 'name' => 'Commercial Managerial', 'slug' => 'commercial-managerial'],
    ];

    public static function residential(): ProjectType
    {
        return ProjectType::query()->whereName('Residential')->first();
    }

    public static function commercial(): ProjectType
    {
        return ProjectType::query()->whereName('Commercial')->first();
    }

    public static function managerial(): ProjectType
    {
        return ProjectType::query()->whereName('Managerial')->first();
    }

    public static function residentialCommercial(): ProjectType
    {
        return ProjectType::query()->whereName('Residential Commercial')->first();
    }

    public static function commercialManagerial(): ProjectType
    {
        return ProjectType::query()->whereName('Commercial Managerial')->first();
    }
}
