<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 11/19/2017
 * Time: 11:14 PM
 */
print "<h1>Accessing the string value of an array key</h1>";
print "<h3>Using the following PHP code we will attempt to display the contents of the \$key variable, or the associative
array key being accessed at the time of the call.</h3>";

?> $x['a'] ="Value numero 1";
    $x['b'] ="Value numero 2";
    $x['c'] ="Value numero 3";
    $x['d'] ="Value numero 4";

    foreach($x as $antonopolous=> $bitcoin){
    print "$antonopolous is the name of the key, and the value therein is $bitcoin<br />";
    }
<?php

$x['a'] ="Value numero 1";
$x['b'] ="Value numero 2";
$x['c'] ="Value numero 3";
$x['d'] ="Value numero 4";

foreach($x as $antonopolous=> $bitcoin){
    print "$antonopolous is the name of the key, and the value therein is $bitcoin<br />";
}

print "<h1>Conclusion</h1>";
print "<h3>I absolutely love learning the crucial and core functionalities of PHP. For instance, I did not know that by 
replacing foreach(\$bigarray as <b>\$singlekey</b>) with foreach(\$bigarray as <b>\$keyvariablename=>\$singlekeyvaluevariable</b>, 
I then have access to the string value of the key, rather than only having access to the data that is stored within that 
key. </h3>";

//Let's now use an alternative function to manipulate arrays as well as iterate through arrays.

print "<h2>This is a test to use list() instead of array() to assign different values to separate variables. 
 The reason this is used is because we may have two or more values that will be used by two or more non-related functions
 of the application, and to store these two or more values within the same array would only create confusion down the line.</h2>
 
<h2>The next function tested here is current(). Current is used along with next(), and <i>possibly</i> foreach(), in order to 
see which value is currently popped  in an array. There will be two tests. One will be used with the 'next()' function and the 
other will be used with 'foreach()'. </h2><br />";

?>

    list($a, $b, $c, $d) = $x;

    while ($match_variable = current($x)){
    print "<h3>\$match_variable = current(\$x)</h3>";
    print "<b>\$match_variable = $match_variable</b><br />";

    next($x);
    }

<?php
list( $a, $b, $c, $d) = $x;


while ($match_variable = current($x)){
    print "<h3>\$match_variable = current(\$x)</h3>";
    print "<b>\$match_variable = $match_variable</b><br />";

    next($x);
}

print "<h3>In this case, we're using the 4 element array: \$x, which includes the variables a, b, c, d. 
I've included the \$key=>\$var
in this case just to see what is returned when I request the value of \$key, which there is no value in this case because 
it is not an associative array. Let's see.</h3><br />";

foreach ($x as $niglet){
    print current($x) . ": current(x)";
    print $niglet . ": niglet";
    $niglet = current($x);

    next($x);
}

print "<h3>In this case, we're using the 4 element array: \$x, which includes the variables a, b, c, d. I've included the \$key=>\$var
in this case just to see what is returned when I request the value of \$key, which there is no value in this case because 
it is not an associative array. Let's see.</h3><br />";
?>


    foreach ($x as $niglet){
    print current($x) . ": current(x)";
    print $niglet . ": niglet";
    $niglet = current();

    next($x);
    }



<?php

$array['gamerProfile'][] = "LikesConsoles";
$array['gamerProfile'][] = "LikesPCGames";
$array['gamerProfile'][] = "LikesPCGames";

$array['datingProfile'][] = "BodyType";
$array['datingProfile'][] = "HairLength";
$array['datingProfile'][] = "Teeth";

$js = json_encode($array);
print "<h2>json_enconde(\$array)</h2>";
print $js;

$js_decode_assoc = json_decode($js, true);
$js_decode = json_decode($js, false);
$js_var_dump = var_export($js, true);
$js_var_dump2 = var_export($js, false);

print "<h2>decoded/associative: <i>".print_r($js_decode_assoc, 1)."</i></h2>";
print "<h2>decoded/non-associative:". print_r($js_decode, 1)."</h2>";
print "<h2>var_dump true". print_r($js_var_dump, 1)."</h2>";
print "<h2>var_dump false". print_r($js_var_dump2d, 1)."</h2>";

print "<h1>var_export and then eval that return</h1>";

$dumpStr = var_export($array,true);
print $dumpStr;
eval("\$somevar = $dumpStr;");
print $somevar;
print_r ($somevar);

print "<h1>GamerProfile Array</h1>";


print_r($array);

print "<h1>EVAL</h1>";

$js=json_encode($array);
$explode = "\$jj = explode(\" \", \"fah q\");";
$joe = eval($explode);
print $js;
//print_r( $js );
print "<br />";
print "<h1>Vehicle</h1>";
?>
<form action="test.php?step=2" method="post">
    <label for="tableOne">
        <span>Table</span>
    </label>
    <br />
    <input type="checkbox" name="tableOne[]" value="Body" checked> I am looking for a fat ho<br>
    <input type="checkbox" name="tableOne[]" value="Height"> I am looking for a giant<br>
    <input type="checkbox" name="tableOne[]" value="Gender" checked> I am looking for a female<br>
    <input type="checkbox" name="tableOne[]" value="Orientation" checked> I am straight<br>
    <input type="checkbox" name="tableOne[]" value="Hair"> I am looking for natural green hair<br>
    <input type="checkbox" name="tableOne[]" value="Feet"> I want them to have clown sized feet.<br>
    <br />
    <br />
    <label for="tableTwo">
        <span>Table Two</span>
    </label>
    <br />
    <input type="checkbox" name="tableTwo[]" value="Console" checked> I have a console<br>
    <input type="checkbox" name="tableTwo[]" value="Online"> I play online games<br>
    <input type="checkbox" name="tableTwo[]" value="Casino" checked> I have a gambling addiction<br>
    <input type="checkbox" name="tableTwo[]" value="Twitch" checked> I stream on twitch a lot<br>
    <input type="submit" value="Submit">
</form>

<?php
$tableCriteria = isset($_GET['step']) ? $_POST : -1;

foreach($tableCriteria as $key=>$tableName){
    print "key: $key <br />" ;
    print print_r($tableName, 1). "<br />";
}

?>