<?php


namespace App;

use App\Exceptions\RouteNotFoundException;

class App
{

  private static DB $db;

  public function __construct(
    protected Router $router, 
    protected array $request, 
    protected Config $config)
  {
    static::$db = new DB($config->db ?? []);
  }

  public static function db(): DB
  {
    return static::$db;
  }

  public function run()
  {
    try {
      echo $this->router->resolve(
        $this->request['method'],
        $this->request['uri']
      );
    } catch (RouteNotFoundException) {
      http_response_code(404);

      echo View::make('errors/404');
    }
  }
}
