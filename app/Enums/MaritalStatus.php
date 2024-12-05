<?php

namespace App\Enums;

class MaritalStatus {
    public const NEVER_MARRIED = 'Never Married';
    public const MARRIED       = 'Married';
    public const WIDOWED       = 'Widowed';
    public const DIVORCED      = 'Divorced';
    public const SEPARATED     = 'Separated';

    public static function all(): array {
        return [
            self::NEVER_MARRIED,
            self::MARRIED,
            self::WIDOWED,
            self::DIVORCED,
            self::SEPARATED,
        ];
    }
}
