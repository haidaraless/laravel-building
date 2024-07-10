<?php

namespace Structure\Project\Exceptions\Space;

use Structure\Project\Exceptions\BaseException;

final class SpaceException extends BaseException
{
    public static function spaceExists(): SpaceException
    {
        return new SpaceException('The space you trying to add already exists!');
    }

    public static function spaceNotExist(): SpaceException
    {
        return new SpaceException('The space you looking for is not exist!');
    }

    public static function titleNotExist(): SpaceException
    {
        return new SpaceException('This space title is not exists!');
    }
}
