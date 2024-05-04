<?php

namespace Structure\Project;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Structure\Project\Commands\ProjectCommand;

class ProjectServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-building')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-building_table')
            ->hasCommand(ProjectCommand::class);
    }
}
