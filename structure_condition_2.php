<?php

$dayOfWeek = 'Friday';
//$dayOfWeek = 'Saturday';
//$dayOfWeek = 'Monday';

if ($dayOfWeek === 'Friday') {
	echo 'Have a nice weekend';
} elseif ($dayOfWeek === 'Saturday' || $dayOfWeek === 'Sunday') {
	echo 'See you on Monday';
} else {
	echo 'See you tomorrow';
}