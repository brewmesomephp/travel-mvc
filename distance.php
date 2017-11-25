<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 11/15/2017
 * Time: 7:35 PM
 */

$api = file_get_contents("http://gamerstack.io/distance_restful_api.php?address1=23 woodcrest circle monroe township nj 08831&address2=5045 voltaire street 92107");
//$api2 = file_get_html("http://gamerstack.io/distance_restful_api.php?address1=23 woodcrest circle monroe township nj 08831&address2=5045 voltaire street 92107");

print "<h2>API: $api</h2>";
//print "<h2>API2: $api2</h2>";