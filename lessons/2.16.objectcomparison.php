<?php

$a1 = new AB("hi");
$a2 = new AB("hi");


// equal
var_dump($a1 == $a2);
// NOT equal - operator compares the references of the objects - different object IDs
var_dump($a1 === $a2);


class AB
{
    public function __construct(public string $text)
    {
    }
}
