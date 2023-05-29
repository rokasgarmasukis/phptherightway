<?php

namespace App;

use App\Exceptions\ViewNotFoundException;

class View
{
  public function __construct(protected string $view, protected array $params = [])
  {
  }

  public static function make(string $view, array $params = []): static
  {
    return new static($view, $params);
  }

  public function render(bool $withLayout = false): string
  {
    // TODO: Add layout support

    $viewPath = VIEW_PATH . '/' . $this->view . '.php';

    if (!file_exists($viewPath)) {
      throw new ViewNotFoundException();
    }

    extract($this->params);

    ob_start();
    include $viewPath;
    return ob_get_clean();
  }

  public function __toString()
  {
    return $this->render();
  }

  public function __get(string $name) {
    return $this->params[$name] ?? null;
  }
}
