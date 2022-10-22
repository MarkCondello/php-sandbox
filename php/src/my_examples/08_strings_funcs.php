<?php
/* ---------- String Functions -------- */

/*
  Functions to work with strings
  https://www.php.net/manual/en/ref.strings.php
*/

$string = 'Hello World';

// Get the length of a string
echo strlen($string);

// Find the position of the first occurrence of a substring in a string
echo strpos($string, 'o');

// Find the position of the last occurrence of a substring in a string
echo strrpos($string, 'o');

// Reverse a string
echo strrev($string);

// Convert all characters to lowercase
echo strtolower($string);

// Convert all characters to uppercase
echo strtoupper($string);

// Uppercase the first character of each word
echo ucwords($string);

// String replace
echo str_replace('World', 'Everyone', $string);

// Return portion of a string specified by the offset and length
echo '<br>'. substr($string, 0, 5) . '<br><br>';
echo substr($string, 5);

// Starts with
if (str_starts_with($string, 'Hello')) {
  echo 'YES';
}

// Ends with
if (str_ends_with($string, 'ld')) {
  echo 'YES';
}

// HTML Entities
$string2 = '<h1>Hello World</h1>';
echo '<br>'.htmlentities($string2) . '<br>';

$script = '<script>alert("Foo")</script>';
echo '<br>'.htmlspecialchars($script) . '<br>';

// Formatted Strings - useful when you have outside data
// Different specifiers for different data types
printf('%s is a %s, %s', 'Brad', 'nice guy', 'that is all....') ;
echo  '<br>';
printf('1 + 13 = %f', 1 + 13); // float
