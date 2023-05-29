<?php

$a = new A();
$b = new B();

echo $a->getName() . PHP_EOL;
echo $b->getName() . PHP_EOL; // calls the method in the class A, but while called on the object of class B, $this is then object $b  => decided on runtime => late binding

// on static
echo A::getStaticName() . PHP_EOL;
echo B::getStaticName() . PHP_EOL;




// classes

class A
{
    protected string $name = 'A';
    protected static string $staticName = 'staticA';

    public function getName(): string
    {
        echo 'class:' . get_class($this) . PHP_EOL;
        return $this->name;
    }

    public static function getStaticName() {
        // echo 'class:' . self::class . PHP_EOL;
        // return self::$staticName; // this is early binding - each time it resolves the class at compile time
        echo 'class:' . static::class . PHP_EOL;
        return static::$staticName; // this is late static binding - each time it resolves the class at runtime 
    }
}

class B extends A
{
    protected string $name = 'B';
    protected static string $staticName = 'staticB';
}

