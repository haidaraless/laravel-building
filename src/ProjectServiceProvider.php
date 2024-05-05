<?php

namespace Structure\Project;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Structure\Project\Commands\ProjectCommand;

class ProjectServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-building')
            ->hasConfigFile()
            ->hasMigration('create_projects_table')
            ->hasCommand(ProjectCommand::class);
    }
}
