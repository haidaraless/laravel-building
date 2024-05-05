<?php

namespace Structure\Project\Exceptions\Floor;

use Structure\Project\Exceptions\BaseException;
use Structure\Project\Exceptions\Unit\UnitException;

class FloorException extends BaseException
{
    public static function floorExists(): FloorException
    {
        return new static("The floor you trying to add already exists!");
    }

    public static function floorNotExist(): FloorException
    {
        return new static("The floor you looking for is not exist!");
    }

    public static function titleNotExist(): UnitException
    {
        return new static("This floor title is not exists!");
    }
}
