<?php

namespace App\Controllers;

use App\View;

class HomeController
{
  public function index(): View
  {
    return View::make('index', ['foo' => 'bar']);
  }

  public function about(): string
  {
    return "About us";
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
