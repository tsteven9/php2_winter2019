<?php

echo 'Counting using for: ' . PHP_EOL;

for ($i = 1; $i <= 10; $i++) {
	echo $i. ' ';
}

echo PHP_EOL;



echo 'Counting using while: ';

$i = 1;

while ($i <= 10) {
	echo $i.' ';
	$i++;
}

echo PHP_EOL;



$i = 1;
echo 'Counting using do-while: ';

do {
	echo $i.' ';
	$i++;
} while ($i < 11);

echo PHP_EOL;
