<?php

namespace App\Enums;

class MaritalStatus {
    public const SINGLE       = 'Single';
    public const MARRIED      = 'Married';
    public const WIDOWED        = 'Widowed';
    public const DIVORCED   = 'Divorced';
    public const SEPARATED   = 'Separated';

    public static function all(): array {
        return [
            self::SINGLE,
            self::MARRIED,
            self::WIDOWED,
            self::DIVORCED,
            self::SEPARATED
        ];
    }
}
