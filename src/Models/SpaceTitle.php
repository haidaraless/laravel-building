<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class SpaceTitle extends Model
{
    use Sushi;

    protected $rows = [
        ['id' => 1, 'title' => 'Living room', 'type' => 'residential'],
        ['id' => 2, 'title' => 'Master bedroom', 'type' => 'residential'],
        ['id' => 3, 'title' => 'Kids bedroom', 'type' => 'residential'],
        ['id' => 4, 'title' => 'Playing room', 'type' => 'residential'],
        ['id' => 5, 'title' => 'Men room', 'type' => 'residential'],
        ['id' => 6, 'title' => 'Women room', 'type' => 'residential'],
    ];
}
