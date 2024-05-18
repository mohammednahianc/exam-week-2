<?php
$strings = ["Hello", "World", "PHP", "Programming"];
$i = 0;

while ($i < count($strings)) {
    $string = $strings[$i];
    $vowelCount = preg_match_all('/[aeiou]/i', $string);
    $reversedString = strrev($string);
    echo "Original String: $string, Vowel Count: $vowelCount, Reversed String: $reversedString\n";
    $i++;
}
?>
