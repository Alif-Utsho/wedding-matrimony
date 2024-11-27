<?php

namespace App\Enums;

class Language {
    public const BANGLA     = 'Bangla';
    public const ENGLISH    = 'English';
    public const HINDI      = 'Hindi';
    public const SPANISH    = 'Spanish';
    public const FRENCH     = 'French';
    public const CHINESE    = 'Chinese';
    public const ARABIC     = 'Arabic';
    public const RUSSIAN    = 'Russian';
    public const GERMAN     = 'German';
    public const JAPANESE   = 'Japanese';
    public const PORTUGUESE = 'Portuguese';
    public const ITALIAN    = 'Italian';
    public const KOREAN     = 'Korean';
    public const TURKISH    = 'Turkish';
    public const DUTCH      = 'Dutch';
    public const SWEDISH    = 'Swedish';
    public const GREEK      = 'Greek';
    public const THAI       = 'Thai';
    public const VIETNAMESE = 'Vietnamese';
    public const POLISH     = 'Polish';

    public static function all(): array {
        return [
            self::BANGLA,
            self::ENGLISH,
            self::HINDI,
            self::SPANISH,
            self::FRENCH,
            self::CHINESE,
            self::ARABIC,
            self::RUSSIAN,
            self::GERMAN,
            self::JAPANESE,
            self::PORTUGUESE,
            self::ITALIAN,
            self::KOREAN,
            self::TURKISH,
            self::DUTCH,
            self::SWEDISH,
            self::GREEK,
            self::THAI,
            self::VIETNAMESE,
            self::POLISH,
        ];
    }
}
