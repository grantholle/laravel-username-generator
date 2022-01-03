<?php

use GrantHolle\UsernameGenerator\Username;

it('can generate a username', function () {
    $this->assertIsString(Username::make());
});

it('can generate a custom username', function () {
    $username = (new Username)
        ->withCasing('slug')
        ->withAdjectiveCount(3)
        ->withNounCount(2)
        ->withDigitCount(0)
        ->generate();

    $this->assertIsString($username);
    $this->assertStringContainsString('-', $username);
});
