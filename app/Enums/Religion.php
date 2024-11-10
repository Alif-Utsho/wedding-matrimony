<?php

namespace App\Enums;

class Religion
{
    public const MUSLIM = 'Muslim';
    public const HINDU = 'Hindu';
    public const JAIN  = 'Jain ';
    public const CHRISTIAN = 'Christian';

    public static function all(): array
    {
        return [
            self::MUSLIM,
            self::HINDU,
            self::JAIN ,
            self::CHRISTIAN,
        ];
    }
}
