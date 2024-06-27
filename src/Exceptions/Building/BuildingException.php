<?php

namespace Structure\Project\Exceptions\Building;

use Structure\Project\Exceptions\BaseException;

class BuildingException extends BaseException
{
    public static function titleNotExist(): BuildingException
    {
        return new static('This project title is not exists!');
    }

    public static function typeNotExist(): BuildingException
    {
        return new static('This project type is not exists!');
    }
}
