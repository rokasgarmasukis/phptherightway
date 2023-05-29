<?php 

// interfaces can contain magic methods, including __construct

// CANNOT have properties
// BUT CAN have constants - but with interfaces they cannot be overridden, unlike with inheritance

interface A
{
    public const CONSTANT = 1;
}


interface B extends A
{
    public function __construct();
}