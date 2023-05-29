<?php 

echo serialize(true) . PHP_EOL;
echo serialize(1) . PHP_EOL;
echo serialize([1,2,3]) . PHP_EOL;
echo unserialize(serialize("rokas"));

// serialize to store in the DB
// when serializing an object, only properties get serialized. Methods do not
// ser and unser craetes a new cloned object => another way to clone