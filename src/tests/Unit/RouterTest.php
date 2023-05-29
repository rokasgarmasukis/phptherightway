<?php 

namespace Tests\Unit;

use App\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    /** @test */
    public function it_registers_a_route(): void
    {
        // given-when-then - here this
        // arrange-act-assert

        // given that we have a router object
        $router = new Router();

        // when we call a register method
        $router->register('get', '/users', ['Users', 'index']);

        $expected = [
            'get' => [
                '/users' => ['Users', 'index'],
            ]
            ];

        // then we assert route was registered
        $this->assertEquals($expected, $router->routes());
    }
}