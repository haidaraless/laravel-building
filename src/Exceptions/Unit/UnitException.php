<?php

namespace Structure\Project\Exceptions\Unit;

use Structure\Project\Exceptions\BaseException;

class UnitException extends BaseException
{
    public static function unitExists(): UnitException
    {
        return new static('The unit you trying to add already exists!');
    }

    public static function unitNotExist(): UnitException
    {
        return new static('The unit you looking for is not exist!');
    }

    public static function titleNotExist(): UnitException
    {
        return new static('This unit title is not exists!');
    }
}
