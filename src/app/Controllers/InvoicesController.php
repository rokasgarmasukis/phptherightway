<?php

namespace App\Controllers;

use App\View;
use App\App;

class InvoicesController
{
  public function index(): View
  {

    $amount = 25;

    $db = App::db();

    try {
      $db->beginTransaction();

      $newInvoiceSthmt = $db->prepare(
        'Insert into invoices (amount, user_id)
        values (:amount, :user_id)'
      );

      $newInvoiceSthmt->bindValue("amount", $amount);
      $newInvoiceSthmt->bindValue("user_id", 1);

      $newInvoiceSthmt->execute();

      $db->commit();
    } catch (\Throwable $e) {
      if ($db->inTransaction()) {
        $db->rollBack();
      }
    }

    return View::make('invoices/index');
  }

  public function create(): View
  {




    return View::make('invoices/create');
  }

  public function store(): string
  {
    $amount = $_POST['amount'];

    return $amount;
  }
}
