<?php
/*
 * General Notes:
 *
 * Regex engines are case sensitive.
 * Leftmost match in the string will be returned first.
 * Regex will try every pattern combination on each character in the string.
 * The Regex engine is eager to return a match.
 *
 * References:
 * http://www.regular-expressions.info/
 * https://regex101.com/
 * Multi-byte string functions: http://www.php.net/manual/en/ref.mbstring.php
 *
 */

$matches = array();

$match = array();

// Find if Bill or William is present in a string.
$pattern = '/Bill|William/';
$test_strings = array('Three Billy Goats Gruff', 'Little Richard',
    'William Styron', 'Free Willy');
foreach ($test_strings as $string) {
    echo $string;
    if (preg_match($pattern, $string)) {
        echo ": Found it!\n";
    } else {
        echo ": Not there.\n";
    }
}

// Find if Bill or William is present in a string.
/*$pattern = '/\bBill\b|\bWilliam\b/';
$test_strings = array('Three Billy Goats Gruff', 'Little Richard',
    'William Styron', 'Free Willy');
foreach ($test_strings as $string) {
    echo $string;
    if (preg_match($pattern, $string)) {
        echo ": Found it!\n";
    } else {
        echo ": Not there.\n";
    }
}*/

// Find if Bill or William is present in a string.
/*$pattern = '/Three.+Billy/'; // 's' modifier needed
$test_strings = array("Three \n Billy Goats Gruff", 'Little Richard',
    'William Styron', 'Free Willy');
foreach ($test_strings as $string) {
    echo $string;
    if (preg_match($pattern, $string)) {
        echo ": Found it!\n";
    } else {
        echo ": Not there.\n";
    }
}*/

//Simple literal
$subject = 'this is a test string containing some text';
$pattern = '/ring/';
/* preg_match($pattern, $subject, $match);
echo __LINE__.': ';
print_r($match); */


//Using a character class
$subject = 'over there is a pile of their clothes';
$pattern = '/the[ir]/';
/* preg_match_all($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches); */


//Using a character class range
$subject = 'over there is a pile of their clothes';
$pattern = '/the[e-i]/';
/* preg_match_all($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches); */


//Using more than one character class range
$subject = 'over there is a pile of their clothes';
$pattern = '/the[e-im-t]/';
/* preg_match_all($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches); */


//Using more than one character class range with a single character
//Double check on the comma, is it used to delimit or as a character????
$subject = 'over there is a pile of their clothes';
$pattern = '/the[e-i,s,m-r]/';
/*preg_match_all($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches); */


//Using negated character class range
$subject = 'over there is a pile of their clothes';
$pattern = '/the[^e-im-r]/';
/* preg_match($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches); */
//Note: The only special(meta) characters allowed inside a character class are: ],\,^,-
//Note: All other metacharacters inside a character class are considered literal, no escape requirement


//Using shorthand character classes
$subject = 'over there is a pile of their clothes';
$pattern = '/the\w/';
/* preg_match_all($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches); */
//Note: \w stands for the "word character". Shorthand for [A-Za-z0-9_]
//Note: \d stands for the "decimal character".  Shorthand for [0-9]
//Note: \s stands for the "whitespace character". Shorthand for \t\r\n
//Note: shorthands can be used inside or outside of brackets.


//Use repeating character with word character classes
$subject = 'over there is a pile of their clothes';
$pattern = '/the\w+/';
/* preg_match_all($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches); */


//Use repeating character + with decimal character classes
$subject = 'Lots of mountains are over 4773 meters high';
$pattern = '/[0-9]+/';
/*preg_match_all($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches); */
//Repeating charactors: ?,+,*