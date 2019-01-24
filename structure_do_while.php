<?php

$total_orders = 6;
$firstname = 'John';
$lastname = 'Doe';

do {
	if ($total_orders == 1) {
	    echo "$firstname $lastname has $total_orders order" . PHP_EOL;
	} else {
		echo "$firstname $lastname has $total_orders orders" . PHP_EOL;
	}
	$total_orders -= 1;
} while ($total_orders > 0);