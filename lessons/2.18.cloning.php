<?php

// ways to create new objects
// new Classname()
// new self() / new static()


// copies of object, with different reference => cloning
// when cloning, constructor doesn't get called, but __clone instead
$book = new Book();
$book2 = clone $book;

// you can also add __clone method to tell what's happening then
class Book
{
    public function __clone(): void
    {
        // might reassign or instantiate property values
    }
}
