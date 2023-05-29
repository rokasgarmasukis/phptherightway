<?php

namespace App\Controllers;

use App\App;
use App\View;

class HomeController
{
  public function index(): View
  {

    // $_SESSION['count'] = ($_SESSION['count'] ?? 0) + 1;

    $db = App::db();

    $query = 'select * from users';
    $stmt = $db->prepare($query);
    $stmt->execute();

    foreach ($stmt->fetchAll() as $user) {
      echo '<pre>';
      var_dump($user);
      echo '</pre>';
    }

    return View::make('index', ['foo' => 'bar']);
  }

  public function about(): string
  {
    return "About us";
  }

  public function download() {
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
