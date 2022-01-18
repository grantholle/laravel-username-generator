<?php

namespace GrantHolle\UsernameGenerator\Commands;

use GrantHolle\UsernameGenerator\Username;
use Illuminate\Console\Command;

class UsernameCommand extends Command
{
    public $signature = 'make:username
        {--c|casing= : The casing to use: "lower", "upper", "studly", "kebab", "camel", "snake", or "slug".}
        {--d|digits= : The number of digits to use for a prefix.}
        {--a|adjectives= : The number of adjectives to use.}
        {--N|nouns= : The number of nouns to use.}
        {--C|count=1 : The number of usernames to generate.}';

    public $description = 'Generate a random username.';

    public function handle(): int
    {
        $count = (int) $this->option('count');

        for ($i = 0; $i < $count; $i++) {
            $username = (new Username)
                ->withAdjectiveCount((int) ($this->option('adjectives') ?? config('username-generator.adjectives')))
                ->withNounCount((int) ($this->option('nouns') ?? config('username-generator.nouns')))
                ->withDigitCount((int) ($this->option('digits') ?? config('username-generator.digits')))
                ->withCasing($this->option('casing') ?? config('username-generator.casing'))
                ->generate();

            $this->info($username);
        }

        return self::SUCCESS;
    }
}
