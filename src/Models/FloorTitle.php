<?php

namespace Structure\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class FloorTitle extends Model
{
    use Sushi;

    protected $rows = [
        ['id' => 1, 'title' => 'Ground Floor', 'abbr' => 'GF', 'order' => 1],
        ['id' => 2, 'title' => 'First Floor', 'abbr' => 'FF', 'order' => 2],
        ['id' => 3, 'title' => 'Second Floor', 'abbr' => 'SF', 'order' => 3],
        ['id' => 4, 'title' => 'Third Floor', 'abbr' => 'TF', 'order' => 4],
        ['id' => 5, 'title' => 'Fourth Floor', 'abbr' => '4F', 'order' => 5],
        ['id' => 6, 'title' => 'Fifth Floor', 'abbr' => '5F', 'order' => 6],
        ['id' => 7, 'title' => 'Sixth Floor', 'abbr' => '6F', 'order' => 7],
        ['id' => 8, 'title' => 'Seventh Floor', 'abbr' => '7F', 'order' => 8],
        ['id' => 9, 'title' => 'Roof Deck', 'abbr' => 'RD', 'order' => 9],
    ];

    public static function groundFloor(): FloorTitle
    {
        return FloorTitle::whereTitle('Ground Floor')->first();
    }

    public static function firstFloor(): FloorTitle
    {
        return FloorTitle::whereTitle('First Floor')->first();
    }

    public static function secondFloor(): FloorTitle
    {
        return FloorTitle::whereTitle('Second Floor')->first();
    }

    public static function thirdFloor(): FloorTitle
    {
        return FloorTitle::whereTitle('Third Floor')->first();
    }

    public static function fourthFloor(): FloorTitle
    {
        return FloorTitle::whereTitle('Fourth Floor')->first();
    }

    public static function fifthFloor(): FloorTitle
    {
        return FloorTitle::whereTitle('Fifth Floor')->first();
    }

    public static function sixthFloor(): FloorTitle
    {
        return FloorTitle::whereTitle('Sixth Floor')->first();
    }

    public static function seventhFloor(): FloorTitle
    {
        return FloorTitle::whereTitle('Seventh Floor')->first();
    }

    public static function roofDeck(): FloorTitle
    {
        return FloorTitle::whereTitle('Roof Deck')->first();
    }
}
