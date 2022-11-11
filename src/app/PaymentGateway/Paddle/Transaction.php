<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

use App\Enums\Status;
use App\PaymentGateway\Paddle\Enums\Status as EnumsStatus;

class Transaction
{

    public static int $count = 0;

    public function __construct()
    {
        $this->setStatus(Status::PENDING);
        self::$count++;
    }

    public function setStatus(string $status): self
    {
        if (!isset(Status::ALL_STATUSES[$status])) {
            throw new \InvalidArgumentException('Invalid status');
        }

        $this->status = $status;

        return $this;
    }
}
