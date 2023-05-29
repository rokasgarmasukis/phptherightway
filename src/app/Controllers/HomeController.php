<?php

namespace App\Controllers;

use App\View;
use App\Models\User;
use App\Models\SignUp;
use App\Models\Invoice;

class HomeController
{
  public function index(): View
  {
    // $_SESSION['count'] = ($_SESSION['count'] ?? 0) + 1;

    $email = 'mai2l@hotmail.com';
    $name = 'bongo';
    $amount = 25;

    $userModel = new User();
    $invoiceModel = new Invoice();

    $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
      [
        'email' => $email,
        'name' => $name,
      ],
      [
        'amount' => $amount,
      ]
    );

    return View::make('index', ['invoice' => $invoiceModel->find($invoiceId)]);
  }

  public function about(): string
  {
    return "About us";
  }

  public function download()
  {
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment;filename="cv.pdf"');

    readfile(STORAGE_PATH . '/cv.pdf');
  }

  public function upload()
  {

    $temp_path = $_FILES['receipt']['tmp_name'];
    $storage_path = STORAGE_PATH . '/' . $_FILES['receipt']['name'];

    move_uploaded_file($temp_path, $storage_path);

    header('Location: /');
    exit;
  }
}
