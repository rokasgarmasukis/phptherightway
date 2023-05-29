<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;

class Invoice extends Model
{
    public function create(float $amount, int $userId)
    {
        $stmt = $this->db->prepare(
            'Insert into invoices (amount, user_id)
            values (:amount, :user_id)'
        );

        $stmt->bindValue("amount", $amount);
        $stmt->bindValue("user_id", $userId);

        $stmt->execute();

        return (int) $this->db->lastInsertId();
    }

    public function find(int $invoiceId): array
    {
        $stmt = $this->db->prepare(
            "select invoices.id, amount, full_name 
            from invoices
            left join users on users.id = user_id
            where invoices.id = ?"
        );

        $stmt->execute([$invoiceId]);

        $invoice = $stmt->fetch();

        return $invoice ? $invoice : [];
    }
}
