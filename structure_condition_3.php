<?php

$color = 'red';

if ($color == 'red') {
	print 'Red is your favorite color' . PHP_EOL;
} elseif ($color == 'green') {
	print 'Green is your favorite color' . PHP_EOL;
} elseif ($color == 'blue') {
	print 'Blue is your favorite color' . PHP_EOL;
} elseif ($color == 'orange') {
	print 'Orange is your favorite color\n' . PHP_EOL;
} elseif ($color == 'yellow') {
	print 'Yellow is your favorite color' . PHP_EOL;
} else {
	print "Invalid color: please choose red, green, blue, orange or yellow";
}

switch ($color) {
	case 'red':
		print 'Red is your favorite color' . PHP_EOL;
		break;
	case 'green':
		print 'Green is your favorite color' . PHP_EOL;
		break;
	case 'blue':
		print 'Blue is your favorite color' . PHP_EOL;
		break;
	case 'orange':
		print 'Orange is your favorite color' . PHP_EOL;
		break;
	case 'yellow':
		print 'Yellow is your favorite color' . PHP_EOL;
		break;
	default:
		print "Invalid color: please choose red, green, blue, orange or yellow";
		break;
}