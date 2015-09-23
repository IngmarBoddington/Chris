<?php
/**
Regular Expressions in PHP
 */

//Regex are a way of matching strings, they describe a formula, in PHP we use PCRE (perl compatible regular expressions)
//The are nearly always started and ended by a common string (usually / or #)
//At the simplest level we can look for a character

//Here preg_match returns a non zero character showing a match and we can dump out the matches from the array filled by reference
$string = 'a string';
if (preg_match('/a/', $string, $matches)) {
    var_dump($matches);
}
echo "\n";

//Here we have no matches :(
if (!preg_match('/z/', $string, $matches)) {
    echo 'No Matches :(';
}
echo "\n";

echo <<<HERE

Walk through these with tester:

We can also match whole strings
    '/string/'

Or any single character
    '/./'

or sets
    '/[a-z]/ig'
    '/[A-Z]/'
    '/[0-9]/'
    '/[A-Z]/'

or a set of options
    '/a|b/'
    '/a|b|c/'

With the above we can also specify the expected number of a character or members of a set
    Optional (zero or one)
    '/a?/'
    One or more
    '/a+/'
    An exact number
    '/a{5}/'
    A range
    '/a{2,5}/'
    A limit
    '/a{,5}/'
    '/a{2,}/'
    Any
    '/a*/'

We can also use ^ for the start and $ for the end
    '/^must be at start to match/'
    '/must be at end to match$/'

^ can also be used in a set to exclude these characters
    '/[^0-9]/'

Also \s is any space characters (inc tab), \d is any number, \w is any word...

Add g as last character for global matching (not just first found)
    '/a/g'

Or i to make case insensitive

=> http://www.cheatography.com/davechild/cheat-sheets/regular-expressions/
HERE;


