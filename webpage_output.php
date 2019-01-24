<?php
$htmlOut = '<!DOCTYPE html>';
$htmlOut .= '<html>';
$htmlOut .= '<head>';
$htmlOut .= '</head>';
$htmlOut .= '<body>';
$htmlOut .= '<form>';
$htmlOut .= 'Username: <input type="text" name="username">';
$htmlOut .= 'Password: <input type="password" name="pass">';
$htmlOut .= '<button name="submit" type="submit" value="1">Submit</button>';
$htmlOut .= '</form>';
$htmlOut .= '</body>';
$htmlOut .= '</html>';

echo $htmlOut;
