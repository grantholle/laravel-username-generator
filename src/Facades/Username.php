<?php

namespace GrantHolle\UsernameGenerator\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \GrantHolle\UsernameGenerator\Username
 */
class Username extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-username-generator';
    }
}
