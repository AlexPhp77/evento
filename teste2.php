<?php 

$array = range(0, 9);

$first_five = array_slice($array, 0, 5);
$remainder = array_slice($array, 5);

print_r($remainder);