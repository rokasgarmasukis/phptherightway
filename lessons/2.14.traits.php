<?php 

// why traits, why not interfaces? With interfaces you'd need to duplicate code between different classes implementing them
// Interfaces are good when classes don't need to have the same implementation

// rules:
// you can redefine a method in the trait by defining it in the class using that trait - the same as class inheritance
// class > trait > superclass

// methods can be private, protected or public

// you can use traits within another trait

class CoffeeMaker
{
    public function makeCoffee()
    {
        echo static::class . ' is making coffee' . PHP_EOL;
    }
}

class LatteMaker extends CoffeeMaker
{
    use LatteTrait;
}

class CappuccinoMaker extends CoffeeMaker
{
    use CappuccinoTrait;
}

class AllInOneCoffeeMaker extends CoffeeMaker
{
    use LatteTrait;
    use CappuccinoTrait;
}

trait LatteTrait
{
    public function makeLatte() 
    {
        echo static::class . ' is making latte' . PHP_EOL;
    }
}

trait CappuccinoTrait
{
    public function makeCappuccino() 
    {
        echo static::class . ' is making cappuccino' . PHP_EOL;
    }
}