<?php

// PHP 7 example!
declare(strict_types = 0);

function getTotal(int $n1, int $n2) : int
{
	return $n1 + $n2;
}

echo getTotal(25.99, 20.00) . PHP_EOL;