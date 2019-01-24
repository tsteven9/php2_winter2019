<?php

$subject = '<body><p>This is a test!</p><p>Another test!</p></body>';

// Match all the inner HTML strings that are contained within HTML tags.  Creates backreferences on matched strings (matches[1]).
$countMatches = preg_match_all('/(?<=>)([^<>].+?[^<>])(?=<\/)/i', $subject, $matches);

var_dump($matches, $countMatches);