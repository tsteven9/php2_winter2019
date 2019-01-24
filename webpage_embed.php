<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>m7ex1</title>
</head>
<body>
<table align="left">

<?php

$myArray = [['The', 'first', 'line'], ['The', 'second', 'line']];

foreach ($myArray as $tableRow) {
    
    print "\t<tr>\n";
    
    foreach ($tableRow as $tableCol) {
        print "\t\t<td align=\"center\">$tableCol</td>\n";
    }
    
    print "\t</tr>\n";
    
}

?>

</table>

</body>
</html>