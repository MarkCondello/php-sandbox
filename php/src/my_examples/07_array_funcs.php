<?php
/* ----------- Arrrays ----------- */

/*
  If you need to store multiple values, you can use arrays. Arrays hold "elements"
*/

// Simple array of numbers
$numbers = [1, 2, 3, 4, 5];

// Simple array of strings
$colors = ['red', 'blue', 'green'];
$fruit = ['avacado', 'apple', 'banana'];
//  in_array('blue', $colors);
$combined = array_combine($colors, $fruit);
// echo "<pre>";
// var_dump( $combined );
// echo "</pre>";

$colors[] = 'yellow';
$colors[] = 'aqua';
array_unshift( $colors, 'poo');
array_pop($colors);


$keys = array_keys($combined);
// print_r($keys);

$flipped = array_flip($combined);
// print_r($flipped);

// unset($colors);
// var_dump( $colors  );
// unset($colors[2]); //slices array
// $chunked_arr = array_chunk($colors, 2);
// echo "<pre>";
// var_dump( $chunked_arr );
// echo "</pre>";
// Using the array function to create an array of numbers
$numbers = [1, 2, 3, 4, 5];
$numbers_next = [11, 12, 13, 14, 15];

$numbers_res = array_merge($numbers, $numbers_next);
$numbs = [...$numbers, 666];
// echo "<pre>";
// var_dump( $numbers_res );
// echo "</pre>";
// echo "<pre>";
// var_dump( $numbs );
// echo "</pre>";
// Outputting values from an array
// echo $numbers[0];
// echo $numbers[3] + $numbers[4];

// We can use print_r or var_dump to see the contents of an array
// var_dump($numbers);


$range_numbs = range(0, 22);
// echo "<pre>";
// var_dump( $range_numbs );
// echo "</pre>";
$new_numb_range = array_map(function($number){
  return "Number " . $number;
}, $range_numbs);
// echo "<pre>";
// var_dump( $new_numb_range );
// echo "</pre>";

$less_than_10 = array_filter($range_numbs, fn($numb) =>  $numb <= 10);
// echo "<pre>";
// print_r( $less_than_10);
// echo "</pre>";

$sum = array_reduce($range_numbs, fn($curr, $next) => $curr + $next);
echo "<pre>";
print_r( $sum);
echo "</pre>";
/* ------ Associative Arrays ----- */

/*
  Associative arrays allow us to use named keys to identify values.
*/

// $colors = [
//   1 => 'red',
//   2 => 'green',
//   3 => 'blue',
// ];

// // echo $colors[1];

// // Strings as keys
// $hex = [
//   'red' => '#f00',
//   'green' => '#0f0',
//   'blue' => '#00f',
// ];

// echo $hex['red'];
// var_dump($hex);

// /* ---- Multi-dimensional arrays ---- */

// /*
//   Multi-dimansional arrays are often used to store data in a table format.
// */

// // Single person
// $person1 = [
//   'first_name' => 'Brad',
//   'last_name' => 'Traversy',
//   'email' => 'brad@gmail.com',
// ];

// // Array of people
// $people = [
//   $person1, //   [...$person1]
//   [
//     'first_name' => 'John',
//     'last_name' => 'Doe',
//     'email' => 'john@gmail.com',
//   ],
//   [
//     'first_name' => 'Jane',
//     'last_name' => 'Doe',
//     'email' => 'jane@gmail.com',
//   ],
// ];

// var_dump($people);

// // Accessing values in a multi-dimensional array
// echo $people[0]['first_name'];
// echo $people[2]['email'];

// // Encode to JSON
// var_dump(json_encode($people));

// // Decode from JSON
// $jsonobj = '{"first_name":"Brad","last_name": "Traversy","email":"brad@gmail.com"}';
// var_dump(json_decode($jsonobj));
