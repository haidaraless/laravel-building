<?php

namespace Structure\Project\Exceptions\Space;

use Structure\Project\Exceptions\BaseException;

class SpaceException extends BaseException
{
    public static function spaceExists(): SpaceException
    {
        return new static('The space you trying to add already exists!');
    }

    public static function spaceNotExist(): SpaceException
    {
        return new static('The space you looking for is not exist!');
    }

    public static function titleNotExist(): SpaceException
    {
        return new static('This space title is not exists!');
    }
}
