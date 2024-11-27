<?php

namespace App\Enums;

class GenderEnum {
    const MALE   = 'Male';
    const FEMALE = 'Female';

    // Method to get all gender options
    public static function options() {
        return [
            self::MALE   => 'Male',
            self::FEMALE => 'Female',
        ];
    }
}
