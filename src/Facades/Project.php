<?php

namespace Structure\Project\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Structure\Project\Project
 */
class Project extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Structure\Project\Project::class;
    }
}
