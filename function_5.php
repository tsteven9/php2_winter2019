<?php

// PHP 7 example!
declare(strict_types = 1);

function getTotal(int $n1, int $n2) : ?int
{
    $n3 = $n1 + $n2;
    if ($n3 >= 20) {
        return null;
    } else {
        return $n1 + $n2;
    }
}

echo getTotal(25, 20) . PHP_EOL;