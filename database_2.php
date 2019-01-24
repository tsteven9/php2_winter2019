<?php

include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'database_inc_common_functions.php';

$customers = getCustomers(array('id' => '1'));

var_dump($customers);