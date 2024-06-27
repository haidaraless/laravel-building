<?php

namespace Structure\Project;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Structure\Project\Commands\BuildingCommand;

class BuildingServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-building')
            ->hasConfigFile()
            ->hasMigration('create_buildings_table')
            ->hasMigration('create_floors_table')
            ->hasMigration('create_units_table')
            ->hasMigration('create_spaces_table')
            ->hasMigration('create_floor_unit_table')
            ->hasMigration('create_space_titles_table')
            ->hasCommand(BuildingCommand::class);
    }
}
