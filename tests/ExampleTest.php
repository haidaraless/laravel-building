<?php

use Illuminate\Console\Command;
use Structure\Project\Commands\ProjectCommand;
use function Pest\Laravel\artisan;

it('can test', function () {
    artisan(ProjectCommand::class)->assertExitCode(Command::SUCCESS);
});
