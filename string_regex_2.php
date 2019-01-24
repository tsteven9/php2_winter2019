<?php

//Using metacharacters
$subject = 'this is a test string containing some text';
$pattern = '/test|text/';
/*preg_match($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches); */


//Using the metacharacter dot(.)
$subject = 'this is a test string containing some text';
$pattern = '/test\s./';
/*preg_match($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches);*/
//Note: Matches any single character except newline characters.
//Note: Use sparingly because it can match cases where it should not.
//Note: the . is considered "greedy"


//Using ^ and $ position anchor metacharacters
$subject = trim(' this is a test string containing some text ');
$pattern = '/^th/';
/*preg_match($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches);*/
//Note: ^ Matches the position immediately before the start of the string.
//Note: $ Matches the position immediately after the end of the string.
//Note: It is a best practice to trim any spaces from the front of the string prior to matching.
//Note: Match against lines of strings preferable to whole files as these will check each line for a match.
//Tip: Use file() to get an array indexed at each line then foreach to test each line.


//Using \A and \Z position anchor metacharacters
$subject = trim(' this is a test th string containing some text ');
$pattern = '/th/';
/*preg_match($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches);*/
//Note: \A only matches the position immediatly before the start of the string.
//Note: \Z only matched the position immediatly after the end of the string.
//Note: These are not supported in all languages.


//Zero-length matches using position anchor metacharacters
$subject = trim(' This is a latter 12 tall.  ');
$pattern = '/\d+/';
/*preg_match_all($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches);*/
//Note: Be careful with this, depending on use, this may or maynot be desired.
//Note: \Z only matched the position immediatly after the end of the string.
//Note: These are not supported in all languages.


//Word boundary \b position metacharacter
$subject = trim(' this is a test string containing some text ');
$pattern = '/\bstring\b/';
/* preg_match($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches); */
//Note: Allows a word match as opposed to single character matches.
//Note: The engine considers the word boundry as a word character.
//Note: The \B is negated version of \b.

//The | alternate metacharacter
$subject = trim(' this is a test string containing some text ');
$pattern = '/\b(string|some)\b/';
/* preg_match_all($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches); */
//Note: Allows searches for each alternate seperated by pipe.
//Note: The engine will match whole words with the grouped boundry like this.


//The ? option metacharacter
$subject = trim(' this is the color blue it is a nice colour ');
//$pattern = '/colou?r/';// or
$pattern = '/co(lou)r/';// grouped optional tokens
/* preg_match_all($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches); */
//Note: Why does the second pattern match "lou"?


//The repetition metacharacters + and *
$subject = trim(' this is the color blue it is a nice colour ');
$pattern = '/is+/';
/* preg_match_all($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches); */
//Note: Why more matches with the * character?


//Limiting repetition metacharacters + and * with {}
$subject = trim(' this is the year 2011 ');
$pattern = '/[1-9][0-9]{2}/';
/*preg_match($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches);*/
//Note: {0,} =  *; {1,} = +


//Greediness -- Be careful with this and the repeating metacharacters
$subject = trim(' It is a <strong>Great</strong> day today ');
$pattern = '/<.+>/';
/* preg_match($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches); */
//Note: The + metacharacter is greedy.  It will repeat the preceding character as often as possible
// and only if that fails, will it backtrack to the plus character and finish the rest of the regex.
//Note: +, *, {1,} and {0,} are considered greedy


//Ungreedy the Greediness with the ? character
$subject = trim(' It is a <strong>Great</strong> day today ');
$pattern = '/<.+?>/';
/* preg_match($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches); */
//Note: The ? metacharacter ungreedies a greedy character.
// It will repeat the preceding character as few a times as possible, which is one.
// and only if that fails, it will forward track and finish the rest of the regex.

//Alternative to the ungreedy ? character
$subject = trim(' It is a <strong>Great</strong> day today ');
$pattern = '/<[^>]+>/';
/* preg_match($pattern, $subject, $matches);
echo __LINE__.': ';
print_r($matches); */
//Note: Backtracking can be CPU intensive in large loops.
//Note: No backtracking occurs here.


//Lets get just the content between the tags.
$subject = trim(' It is a <strong>very nice</strong> day today ');
$pattern = '/(?<=>)[^><]+?(?=<)/s';
/* preg_match($pattern, $subject, $matches);
echo __LINE__. ': ';
print_r($matches); */
// The ?<= operator, or the 'lookbehind operator', matches the patter following it but
// does not return it.  Perfect for starting at the content.
// The [^<>]+? matches everything but the '>' and '<' and ungreedies with the '?' lazy quantifier.
// The ?= operator, or the 'lookahead operator' in the (?=<) part is the opposite of the lookbehind operator,
// in this case, the part of the pattern preceeding the '<' will match but not be returned.