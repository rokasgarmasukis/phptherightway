<?php

use App\Enums\Status;
use App\PaymentGateway\Paddle\Transaction;

require __DIR__ . '/../vendor/autoload.php';

// $id = new \Ramsey\Uuid\UuidFactory();
// echo $id->uuid4();

$transaction = new Transaction();
$transaction->setStatus(Status::PAID);

var_dump(Transaction::$count);
