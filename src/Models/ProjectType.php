<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class ProjectType extends Model
{
    use Sushi;

    protected $rows = [
        ['id' => 1, 'type' => 'Residential'],
        ['id' => 2, 'type' => 'Commercial'],
        ['id' => 3, 'type' => 'Managerial'],
        ['id' => 4, 'type' => 'Residential Commercial'],
        ['id' => 5, 'type' => 'Commercial Managerial'],
    ];

    public static function residential(): ProjectType
    {
        return ProjectType::query()->whereType('Residential')->first();
    }

    public static function commercial(): ProjectType
    {
        return ProjectType::query()->whereType('Commercial')->first();
    }

    public static function managerial(): ProjectType
    {
        return ProjectType::query()->whereType('Managerial')->first();
    }

    public static function residentialCommercial(): ProjectType
    {
        return ProjectType::query()->whereType('Residential Commercial')->first();
    }

    public static function commercialManagerial(): ProjectType
    {
        return ProjectType::query()->whereType('Commercial Managerial')->first();
    }
}
