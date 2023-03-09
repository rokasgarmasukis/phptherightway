<?php

namespace App\Controllers;

class InvoicesController
{
  public function index(): string
  {
    return  "invoices home";
  }

  public function create(): string
  {
    return '<form method="post" action="/invoices/store"><input name="amount" /><button type="submit">Submit</button></form>';
  }

  public function store(): string
  {
    $amount = $_POST['amount'];

    return $amount;
  }
}
