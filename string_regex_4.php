<?php

$subject = '<body><p>This is a test!</p><p>Another test!</p></body>';

// Match an inner HTML string that is contained within HTML tags.  Creates a backreference on the matched string (matches[1]).
$countMatches = preg_match('/(?<=>)([^<>].+?[^<>])(?=<\/)/i', $subject, $matches);

var_dump($matches, $countMatches);