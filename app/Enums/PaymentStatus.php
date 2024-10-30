<?php

namespace App\Enums;

class PaymentStatus
{
    const PAID = 'Paid';
    const CANCELED = 'Canceled';
    const FAILED = 'Failed';

    // Optionally, you can create a method to get all statuses
    public static function all()
    {
        return [
            self::PAID,
            self::CANCELED,
            self::FAILED,
        ];
    }
}