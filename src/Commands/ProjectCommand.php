<?php

namespace Structure\Project\Commands;

use Illuminate\Console\Command;

class ProjectCommand extends Command
{
    public $signature = 'laravel-building';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
