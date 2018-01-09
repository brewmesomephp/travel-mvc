<?php
print "hi...";
//header('Content-type: text/plain');
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 11/19/2017
 * Time: 11:14 PM
 */


require_once "core/config.php";
require_once "core/match.php";
//$q = "SELECT * FROM users WHERE id!='476' LIMIT 7";
//$a = $db->query($q, MYSQLI_ASSOC);

//if ($result = $db->query("SELECT * FROM users WHERE id>'473'  LIMIT 10")) {
//    printf("Select returned %d rows.\n", $result->num_rows);
//    foreach($result as $key=>$res){
//        print "res is " . print_r($res, 1) ;
//    }
//
//    /* free result set */
//    $result->close();
//}


print "hi~~";
$match = new Match("481", $db, "480");
$rnd = rand(1, 291382);
?>
<div class="stateful_response"></div>
<button class="stateful" >Click me</button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".stateful").click(function () {
            var passover = 1;

            $.post("test/stateful_test.php", {serial: <?=$rnd?>}, function (result) {
                $(".stateful_response").html(result);
//               $(".response_content").html("Tree Branch");

            })
        })
    });
</script>

<?php


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
print "hi~~";
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
print "hi.. ";
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
//    print current($x) . ": current(x)";
//    print $niglet . ": niglet";
    $niglet = current($x);

    next($x);
}

print "<h3>In this case, we're using the 4 element array: \$x, which includes the variables a, b, c, d. I've included the \$key=>\$var
in this case just to see what is returned when I request the value of \$key, which there is no value in this case because 
it is not an associative array. Let's see.</h3><br />";
?>

/*
    foreach ($x as $niglet){
    print current($x) . ": current(x)";
    print $niglet . ": niglet";
    $niglet = current();

    next($x);
    }

*/

<?php

$array['gamerProfile'][] = "LikesConsoles";
$array['gamerProfile'][] = "LikesPCGames";
$array['gamerProfile'][] = "LikesPCGames";

$array['datingProfile'][] = "BodyType";
$array['datingProfile'][] = "HairLength";
$array['datingProfile'][] = "Teeth";

$js = json_encode($array);
print "<h2>json_encode(\$array)</h2>";
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
$x= 0;


$ak = array_keys($array);
print $array[$ak[0]][1];
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



//foreach($tableCriteria as $key=>$tableName){
//    print "key: $key <br />" ;
//    print print_r($tableName, 1). "<br />";
//}

$array2[] = 2;
print implode(",", $array2);

$z['xyz'][] = "hi";
$z['xyz'][] = "ha";
$z['xyz'][] = "hl";
$z['xyz'][] = "hlq";
$z['xyz'][] = "hlZd";
$z['xyz'][] = "hlZd";
$z['xyz'][] = "hlZd";
$z['abc'] = "9yijdl";

$z['xyz']['fuck'] = "9yijdl";
$z['xyz']['you'] = "9yijdl";


$zk = array_keys($z);
print_r($ak);

//foreach($z as $item=>$value){
//    $value = print_r($value, true);
//
//
//    print "<br />item: $item<br />";
//    print ", value: $value<br />";
//}



?>
<form action="test.php?step=7" method="post">
    <label for="tableOne">
        <span>Table</span>
    </label>
    <br />
    <input type="checkbox" name="tableOne[criteria0]" value="Body" checked> I am looking for a fat ho<br>
    <input type="checkbox" name="tableOne[criteria1]" value="Height"> I am looking for a giant<br>
    <input type="checkbox" name="tableOne[criteria2]" value="Gender" checked> I am looking for a female<br>
    <input type="checkbox" name="tableOne[criteria3]" value="Orientation" checked> I am straight<br>
    <input type="checkbox" name="tableOne[criteria4]" value="Hair"> I am looking for natural green hair<br>
    <input type="checkbox" name="tableOne[criteria5]" value="Feet"> I want them to have clown sized feet.<br>
    <br />
    <br />
    <label for="tableTwo">
        <span>Table Two</span>
    </label>
    <br />
    <input type="checkbox" name="tableTwo[weight]" value="Console" checked> I have a console<br>
    <input type="checkbox" name="tableTwo[category]" value="Online"> I play online games<br>
    <input type="checkbox" name="tableTwo[criteria0]" value="Casino" checked> I have a gambling addiction<br>
    <input type="checkbox" name="tableTwo[mongoloid]" value="Twitch" checked> I stream on twitch a lot<br>
    <input type="submit" value="Submit">
</form>

Exporting the POST with 3d array as the name of the HTML Input Attribute, tableOne, tableTwo, then inside are the
actual categories. :). this way we can keep the categories sorted, in case there are duplicate column names within
each table container.
<?php

if (isset($_GET['step'])){
    if ($_GET['step'] == 7){
        $dump = var_export($_POST);
        print "dump is: $dump";
    }
}

print "explicit example: POST['tableTwo']['criteria0']; = " . $_POST['tableTwo']['criteria0'];

print ",  POST['tableOne']['criteria0']; = " . $_POST['tableOne']['criteria0'];

?>

<form action="test.php?step=8" method="post">
    <label for="tableOne">
        <span>Table</span>
    </label>
    <br />

    <?php
    $tables = $_POST;
    foreach($tables as $key=>$columns){
        if (is_array($columns)){
        }
        foreach($columns as $key2=>$column){
            ?>
            <input type="text" name="<?=$key?>[<?=$key2?>]" placeholder="<?=$column?>">
            <?php
//            print "Key $key, Key2 $key2, $column IS THE TRUTH. THE WAY! THE LIGHT!<br />";


        }
    }
    ?>
    <input type="submit" value="Submit">
<?php
    ?>
    <input type="checkbox" name="tableOne[criteria0]" value="Body" checked> I am looking for a fat ho<br>
    <input type="checkbox" name="tableOne[criteria1]" value="Height"> I am looking for a giant<br>
    <input type="checkbox" name="tableOne[criteria2]" value="Gender" checked> I am looking for a female<br>
    <input type="checkbox" name="tableOne[criteria3]" value="Orientation" checked> I am straight<br>
    <input type="checkbox" name="tableOne[criteria4]" value="Hair"> I am looking for natural green hair<br>
    <input type="checkbox" name="tableOne[criteria5]" value="Feet"> I want them to have clown sized feet.<br>
    <br />
    <br />
    <label for="tableTwo">
        <span>Table Two</span>
    </label>
    <br />
    <input type="checkbox" name="tableTwo[weight]" value="Console" checked> I have a console<br>
    <input type="checkbox" name="tableTwo[category]" value="Online"> I play online games<br>
    <input type="checkbox" name="tableTwo[criteria0]" value="Casino" checked> I have a gambling addiction<br>
    <input type="checkbox" name="tableTwo[mongoloid]" value="Twitch" checked> I stream on twitch a lot<br>
    <input type="submit" value="Submit">
</form>

<?php

class nofunction
{


    public function __call($method, $args) {
        print "What a beautiful norming.";
        print print_r ($args, 1);
    }


}
$nof = new nofunction();
print "rady palyer one";
$nof->fuckThisClassItDoesntExist("I have money of the ear", 24, "where am i passing this?", "does this function even exist");



?>
<br />
<hr>
<h2>Wizard Step: <i class="stepone">One</i></h2>
<input type="text" class="emailaddress" name="emailaddress" >
<textarea class="misspell" style="width:50em;height:5em;"></textarea>
<div class="response_content"></div>
<button value="next...">


<script>

    $(document).ready(function(){
       $(".emailaddress").keyup(function(){
           var address = ($(".emailaddress").val());
           $.post("test/ajax.php?wizard=1", {email: address}, function (result){
               $(".response_content").html(result);
//               $(".response_content").html("Tree Branch");
               console.log("test");

               var returned_data;
               returned_data = JSON.parse(result);
               console.log(returned_data);
               console.log(result+ "is the difference")

               jd = returned_data;

//               console.log(jd.email);
//               jQuery.each(returned_data, function(i, val) {
//                   $("#" + i).append(document.createTextNode(" - " + val));
//               });
           });
       }) ;
    });
</script>
</button>
    <?php

    $criteria = isset($_GET['step']) ? $_POST : 0;

    print sizeof($_POST) . " is the size of post";
    if ($criteria) {
        foreach ($criteria as $key => $postData) {
            if (is_array($criteria[$key])){
                print "<br />it is an array <br />";
                foreach($criteria[$key] as $key2=>$inside){
//                    print "criteria[key][key2] = filter_input (INPUT_POST, $key2, FILTER_SANITIZE_STRING);" .
//                    "that turns out to be : " . $criteria[$key][$key2]."<br />";
////                    $criteria[$key][$key2] = filter_input(INPUT_POST, $key2, FILTER_SANITIZE_STRING);

                }

            }
            $criteria[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
        }
    }
    print "the filter_input data comes out to be <br /> <h2>" . print_r($criteria, 1) . "</h2>";
    print_r ($_POST);

    set_time_limit(100);
    $api = file_get_contents("http://diffseo.com/gamerstack_live/distance_restful_api.php?address1=23+woodcrest+circle+monroe+township+nj+08831&address2=5045+voltaire+street+san+diego+ca+92107");
    print_r( $api);

    //    $wizardModel = $this->getModel('WizardModel', $db);

?>
