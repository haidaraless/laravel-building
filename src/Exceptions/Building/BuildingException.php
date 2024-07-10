<?php

namespace Structure\Project\Exceptions\Building;

use Structure\Project\Exceptions\BaseException;

final class BuildingException extends BaseException
{
    public static function titleNotExist(): BuildingException
    {
        return new BuildingException('This project title is not exists!');
    }

    public static function typeNotExist(): BuildingException
    {
        return new BuildingException('This project type is not exists!');
    }
}
