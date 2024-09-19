<?php

namespace Elcomwares\WebMaster\Commands;

use Illuminate\Console\Command;

class WebMasterCommand extends Command
{
    public $signature = 'laravel-webmaster';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
