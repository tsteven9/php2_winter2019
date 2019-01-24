<?php

$array1 = [0 => 'original', 1 => 'value1'];

$array2 = [0 => 'newvalue', 2 => 'addedvalue'];

var_dump(array_merge($array1, $array2));

/*
 * Original value is kept at the original key.
 *
 * New values will be appended at the next available index.
 *
 * Return value of the above example:
 *
 * array(4) {
 * [0] =>
 * string(8) "original"
 * [1] =>
 * string(6) "value1"
 * [2] =>
 * string(8) "newvalue"
 * [3] =>
 * string(10) "addedvalue"
 * }
 *
 */