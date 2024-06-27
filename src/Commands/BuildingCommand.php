<?php

namespace Structure\Project\Commands;

use Illuminate\Console\Command;

class BuildingCommand extends Command
{
    public $signature = 'building:run';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
