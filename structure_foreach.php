<?php

$cards = array(
		'red'    => array(1, 2, 3, 4),
		'blue'   => array(1, 2, 3, 4),
		'green'  => array(1, 2, 3, 4),
		'yellow' => array(1, 2, 3, 4)
);

foreach ($cards as $card) {
	echo $card[0] + $card[1];
	echo PHP_EOL;
	echo $card[2] + $card[3];
	echo PHP_EOL;
}