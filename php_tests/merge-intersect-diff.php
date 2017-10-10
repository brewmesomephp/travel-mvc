<?php
$a = array('a' => 'Japan', 'b' => 'Cambodia', 'c' => 'Thailand', 'd' => 'Tanzania', 'e' => 'Japan');
$b = array('a' => 'Japan', 'b' => 'Thailand', 'c' => 'Cambodia', 'q' => 'Slovak', 'r' => 'Tanzania');


print "a: " . print_r($a, 1) . "<br />";
print "b: " . print_r($b, 1) . "<br />";

$a = array_unique($a);
$b = array_unique($b);


print "<br /> A and B are now going to be unique <br />";
print "a: " . print_r($a, 1) . "<br />";
print "b: " . print_r($b, 1) . "<br /><br />";

$a_plus_b = $a + $b;
//var_dump($a_plus_b);
$b_plus_a = $b + $a;

print "a + b: " ; print_r($a+$b); print "<br />";
print "b + a: " ; print_r($b+$a); print "<br />";
print "b + b: " ; print_r($b+$b); print "<br />";
print "a + a: " ; print_r($a+$a); print "<br /><br />";
//print "a * a: " ; print_r($a*$a); print "<br />";
//print "a - a: " ; print_r($a-$a); print "<br />";
//print "b - a: " ; print_r($b-$a); print "<br />";
//print "a - b: " ; print_r($a-$b); print "<br />";


$merge =  array_merge($a, $b);
$intersect = array_intersect($a, $b);


print "Merge a and b: " . print_r($merge, 1) . "<br />";
print "Intersect a and b: " . print_r($intersect, 1) . "<br />";

$diff = array_diff($a, $b);
$diff2 = array_diff_key($a, $b);
$diff3 = array_diff_assoc($a, $b);

$diff_merge_intersect = array_diff($merge, $intersect);

print "Diff a and b : " . print_r($diff, 1) . "<br />";
print "Diff b and a : " . print_r(array_diff($b, $a), 1) . "<br />";
print "Diff a and b : " . print_r(array_diff($a, $b), 1) . "<br />";
print "Diff_key a and b: " . print_r($diff2, 1) . "<br />";
print "Diff_assoc a and b: " . print_r($diff3, 1) . "<br />";
print "Difference between merge and intersect: " . print_r($diff_merge_intersect, 1) . "<br />";






?>