<?php
/**
 * Copy By Value Vs Copy By Reference
 */

//By Value (non-objects) - Result, $foo and $bar reference different values which are the same, $foo = 1, $bar = 1
$foo = 1;
$bar = $foo;
//cont... (non-objects) - Result, $foo and $bar reference different values, $foo = 1, $bar = 2
$bar = 2;
$foo = 7;
echo "Non-objects by value: foo = $foo, bar = $bar";
echo "\n";

//By Reference (non-objects) - Result, $foo and $bar reference same values, both equal to 1
$foo = 1;
$bar = &$foo;
//cont... (non-objects) - Result, $foo and $bar reference same values, both equal to 2
$bar = 2;
$foo = 7;
$bar = 'string';
echo "Non-objects by reference: foo = $foo, bar = $bar";
echo "\n";
echo "\n";
echo "\n";


//Daft example
$originalMessage = 'message';
$htmlMessage = $originalMessage;
$htmlMessage = '<html>'.$htmlMessage.'</html>';

//Send email
$actualMessage = $originalMessage.$seperator.$htmlMessage;


//Copy by value in functions
$array = array(1, 2, 6, 3);

function meh($array) { //$array is here is a copy (by value) - needs to be returned
    $array[6] = 'smeg';
    return $array;
}

$array = meh($array);
var_dump($array);

//Copy by reference in functions
$array = array(1, 2, 6, 3);

function meh2(&$array) { //$array is here is a copy (by reference) - does not need to be returned
    $array[6] = 'smeg';
}

meh($array);
var_dump($array);


$array = array('lots', 'of', 'strings');
foreach ($array as $value) {
    echo $value;
    $value = $value."blah"; //This will not change the elements in the original array (as these copied by value)
    echo "\n";
}
echo "\n";

//The below saves on memory as a seperate copy of the array is not required inside the loop
$array = array('lots', 'of', 'strings');
foreach ($array as &$value) {
    echo $value;
    $value = $value."blah"; //This will change the elements in the original array
    echo "\n";
}
echo "\n";

//However not resetting this can lead to odd behaviour
foreach ($array as $value) {
    echo $value;
    echo "\n";
}
echo "\n";

//Remember to unset reference to fix
unset($value);


//Objects copy by reference by default (in PHP 5.x) - Result, $foo and $bar reference different values, both equal to 1
class sillyClass {

    public $value = 2;

    public function setValue($value) {
        $this->value = $value;
    }
}

$obj = new sillyClass();
$objTwo = $obj; //Here we are using an object, so this will be copied by erference
$obj->setValue(10);
echo "Objects by reference: obj->value = {$obj->value}, objTwo->value = {$objTwo->value}";
echo "\n";
echo "\n";
echo "\n";

$objThree = clone $obj; //Override to copy by value



