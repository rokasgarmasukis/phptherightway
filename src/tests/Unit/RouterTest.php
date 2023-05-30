<?php

namespace Tests\Unit;

use App\Exceptions\RouteNotFoundException;
use App\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    private Router $router;

    protected function setUp(): void
    {
        parent::setUp();
        $this->router = new Router();
    }


    // /** @test */
    public function test_that_it_registers_a_route(): void
    {
        // given-when-then - here this
        // arrange-act-assert

        // given that we have a router object

        // when we call a register method
        $this->router->register('get', '/users', ['Users', 'index']);

        $expected = [
            'get' => [
                '/users' => ['Users', 'index'],
            ]
        ];

        // then we assert route was registered
        $this->assertEquals($expected, $this->router->routes());
    }

    public function test_that_it_registers_a_get_route()
    {
        $this->router->get('/users', ['Users', 'index']);

        $expected = [
            'get' => [
                '/users' => ['Users', 'index'],
            ]
        ];
        $this->assertEquals($expected, $this->router->routes());
    }

    public function test_that_it_registers_a_post_route()
    {
        $this->router = new Router();

        $this->router->post('/users', ['Users', 'store']);

        $expected = [
            'post' => [
                '/users' => ['Users', 'store'],
            ]
        ];
        $this->assertEquals($expected, $this->router->routes());
    }

    public function test_that_routes_initialy_empty()
    {
        $this->router = new Router();

        $this->assertEmpty((new Router())->routes());
    }

    /**
     * @dataProvider routeNotFoundCases
     */
    public function test_that_it_throws_route_not_found_exception(
        string $requestUri,
        string $requestMethod,
    ) {
        $users = new class()
        {
            public function delete(): bool
            {
                return true;
            }
        };

        $this->router->post('/users', [$users::class, 'store']);
        $this->router->get('/users', ['Users', 'index']);

        $this->expectException(RouteNotFoundException::class);
        $this->router->resolve($requestMethod, $requestUri);
    }

    public function routeNotFoundCases(): array
    {
        return [
            ['/users', 'put'], // method does not exist
            ['/cars', 'index'], // path does not exist
            ['/users', 'get'], // class not found
            ['/users', 'post'] // action not found
        ];
    }

    public function test_that_it_resolves_route_from_a_closure(): void
    {
        $this->router->get('/users', fn () => [1, 2, 3]);

        $this->assertEquals(
            [1, 2, 3],
            $this->router->resolve('get', '/users')
        );
    }

    public function test_that_it_resolves_route(): void
    {
        $users = new class() {
            public function index(): array
            {
                return [1, 2, 3];
            }
        };

        $this->router->get('/users', [$users::class, 'index']);

        // assertEquals ==
        // assertSame ===
        $this->assertSame(
            [1, 2, 3],
            $this->router->resolve('get', '/users')
        );
    }
}
