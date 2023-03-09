<?php

namespace App\Controllers;

class HomeController
{
  public function index(): string
  {

    return 'Home';
  }

  public function about(): string
  {
    return "About us";
  }
}
