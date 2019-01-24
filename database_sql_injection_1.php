<?php

// BEWARE!!! This script is unsafe!!!
// sqlmap -u http://localhost/database_sql_injection_1.php --wizard

function getConnection()
{
    if (!isset($link)) {
        static $link = NULL;
    }
    
    if ($link === NULL) {
        $link = mysqli_connect('localhost', 'loginuser', 'testpass', 'andrew_session_app');
    }
    return $link;    
}

function closeConnection()
{
    if (!isset($link)) {
        static $link = NULL;
        return FALSE;
    } else {
        mysqli_close($link);
        return TRUE;
    }
}

function getQuote()
{
    return "'";
}

// SELECT `id`,`username` FROM `users` WHERE x=y
// $where = [key = column name, value = data]
// $andOr = AND | OR
function getCustomers()
{
    $id = isset($_GET['id']) ? $_GET['id'] : '1';
    $query = 'SELECT `id`,`username` FROM `users` WHERE id = ' . $id;
    $link = getConnection();
    $result = mysqli_query($link, $query);
    return mysqli_fetch_all($result);
}

$myArray = getCustomers();

closeConnection();

$htmlOut = "<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<table>\n";

foreach ($myArray as $tableRow) {
    $htmlOut .= "\t<tr>\n";
    foreach ($tableRow as $tableCol) {
        $htmlOut .= "\t\t<td align=\"center\">$tableCol</td>\n";
    }
    $htmlOut .= "\t</tr>\n";
}

$htmlOut .= "</table>\n";

$getParam = $_GET['id'];

$htmlOut .= "<p>$getParam</p>\n";

$htmlOut .= "</body>\n</html>";

echo $htmlOut;
