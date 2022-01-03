<?php

namespace GrantHolle\Username\Commands;

use Illuminate\Console\Command;

class UsernameCommand extends Command
{
    public $signature = 'username:make';

    public $description = 'Generate a random username.';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
