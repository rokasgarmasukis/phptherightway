<?php


namespace App;

use App\Exceptions\RouteNotFoundException;

class Router
{

  private array $routes = [];

  public function register(string $method, string  $route, callable|array $action): self
  {
    $this->routes[$method][$route] = $action;

    return $this;
  }

  public function get(string $route, callable|array $action): self
  {
    $this->register('get', $route, $action);

    return $this;
  }

  public function post(string $route, callable|array $action): self
  {
    $this->register('post', $route, $action);

    return $this;
  }

  public function routes():array
  {
    return $this->routes;
  }

  public function resolve(string $requestMethod, string $requestUri)
  {

    $route = explode('?', $requestUri)[0];
    $action = $this->routes[$requestMethod][$route] ?? null;

    if (!$action) {
      throw new RouteNotFoundException();
    }

    if (is_callable($action)) {
      return call_user_func($action);
    }

    if (is_array($action)) {
      [$class, $method] = $action;
      if (class_exists($class) && method_exists($class, $method)) {
        return call_user_func_array([new $class(), $method], []);
      }
    }

    throw new RouteNotFoundException();
  }
}
