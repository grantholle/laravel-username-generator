<?php

namespace GrantHolle\Username\Commands;

use Illuminate\Console\Command;

class UsernameCommand extends Command
{
    public $signature = 'laravel-username-generator';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
