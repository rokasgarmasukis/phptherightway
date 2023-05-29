<?php

class Invoice
{

    protected function process(float $amount, $description)
    {
        var_dump($amount, $description);
    }

    public function __call($name, $arguments)
    {
        if (method_exists($this, $name)) {
            call_user_func_array([$this, $name], $arguments);
        }
    }

    public static function __callStatic($name, $arguments)
    {
        var_dump('static', $name, $arguments);
    }

    public function __invoke()
    {
        echo "invoked!";
    }
}

// __call, __callStatic
// (new Invoice())->process(20, 'desc');
// Invoice::process(40, 'desc2');

// __invoke
$inv = new Invoice();
$inv();

// others: __debugInfo (if object contains sensitive info, you can specify what gets var_dumped here)