<?php

namespace App\Enums;

class JobType {
    public const BUSINESS   = 'Business';
    public const EMPLOYEE   = 'Employee';
    public const GOVERNMENT = 'Government';
    public const JOBLESS    = 'Jobless';

    public static function getValues(): array {
        return [
            self::BUSINESS,
            self::EMPLOYEE,
            self::GOVERNMENT,
            self::JOBLESS,
        ];
    }
}
