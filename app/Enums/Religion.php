<?php

namespace App\Enums;

class Religion {
    public const MUSLIM      = 'Muslim';
    public const HINDU       = 'Hindu';
    public const JAIN        = 'Jain';
    public const CHRISTIAN   = 'Christian';
    public const BUDDHIST    = 'Buddhist';
    public const SIKH        = 'Sikh';
    public const JUDAISM     = 'Judaism';
    public const ZOROASTRIAN = 'Zoroastrian';
    public const BAHAI       = 'Bahai';
    public const SHINTO      = 'Shinto';

    public static function all(): array {
        return [
            self::MUSLIM,
            self::HINDU,
            self::JAIN,
            self::CHRISTIAN,
            self::BUDDHIST,
            self::SIKH,
            self::JUDAISM,
            self::ZOROASTRIAN,
            self::BAHAI,
            self::SHINTO,
        ];
    }
}
