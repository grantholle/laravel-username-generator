<?php

namespace GrantHolle\Username\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \GrantHolle\Username\Username
 */
class Username extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-username-generator';
    }
}
