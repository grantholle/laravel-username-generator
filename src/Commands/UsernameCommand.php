<?php

namespace GrantHolle\UsernameGenerator\Commands;

use Illuminate\Console\Command;

class UsernameCommand extends Command
{
    public $signature = 'make:username';

    public $description = 'Generate a random username.';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
