<?php 

// when overriding a method in a subclass, parent method doesn't get called
// but you can call it explicitly, like parent::__construct();
// if calling parent constructor from the subclass, do it as the first thing in the subclass constructor

// also signature rules do not apply to constructors - all other overriden methods have to have the same signature

// but all overriding methods can have additional arguments, but only with default values

// you can make a class or a method 'final' to prevent overriding

// when inheritance bad - 
// 1. You  might inherit methods you don't need, 
// 2. Not as good as composition when used to represent multiple classes - in some cases the methods won't exist on the parent classes