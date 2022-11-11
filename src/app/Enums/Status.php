<?php

declare(strict_types=1);

namespace App\Enums;


class Status
{
    const PAID = 'paid';
    const PENDING = 'pending';
    const DECLINED = 'declined';

    public const ALL_STATUSES = [
        self::PAID => 'Paid',
        self::PENDING => 'Pending',
        self::DECLINED => 'Declined',
    ];
}
