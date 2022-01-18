<?php

use GrantHolle\UsernameGenerator\DigitGenerator;

it('can generate digits', function ($count) {
    $digits = DigitGenerator::make($count);

    $this->assertEquals($count, strlen($digits));

    if (!empty($digits)) {
        $this->assertTrue(is_numeric($digits));
    }
})->with([
    range(1, 10),
    0,
]);

//it("can't be a digit that isn't allowed", function () {
//    $this->assertNotEquals('69', DigitGenerator::make(2));
//})->with(range(0, 2000));
