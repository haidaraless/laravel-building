<?php

use Illuminate\Console\Command;
use Structure\Project\Commands\BuildingCommand;

use function Pest\Laravel\artisan;

it('can test', function () {
    artisan(BuildingCommand::class)->assertExitCode(Command::SUCCESS);
});
