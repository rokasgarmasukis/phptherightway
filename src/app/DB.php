<?php

declare(strict_types=1);

class DB
{

    private static ?DB $instance = null;

    private function __construct(public array $config)
    {
    }

    public static function getInstance(array $config)
    {
        if (self::$instance === null) {
            self::$instance = new DB($config);
        }

        return self::$instance;
    }
}
