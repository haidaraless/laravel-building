<?php

namespace Structure\Project\Exceptions\Project;

use Structure\Project\Exceptions\BaseException;
use Structure\Project\Exceptions\Unit\UnitException;

class ProjectException extends BaseException
{
    public static function titleNotExist(): UnitException
    {
        return new static("This project title is not exists!");
    }

    public static function typeNotExist(): UnitException
    {
        return new static("This project type is not exists!");
    }
}
