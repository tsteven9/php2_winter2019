    <?php

$a = FALSE;

$b =  TRUE;
//$b = FALSE;

if ($a || $b) {
	echo 'Running...';
	echo PHP_EOL;
}

// Problem! No difference between true or false.
switch (true) {
    // Forgot the break!
	case $a:
	case $b:
		echo 'Running program...';
		break;
}