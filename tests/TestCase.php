<?php

namespace GrantHolle\Username\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use GrantHolle\Username\UsernameServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            UsernameServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-username-generator_table.php.stub';
        $migration->up();
        */
    }
}
