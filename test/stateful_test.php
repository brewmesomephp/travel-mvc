<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 12/5/2017
 * Time: 3:38 PM
 */
require_once("../core/libs/stateful.php");



function destroyState(Stateful\Stateful $stateful){
    print "I am destroying your state";
    $stateful->stateDestroy();
}
if (!isset($_SESSION['stateful_obj'])) {
    $state = new Stateful\Stateful();
    $_SESSION['stateful_obj'] = $state;
}
else{
    $state = $_SESSION['stateful_obj'];
    print "OLD ";
}


print "STATEFUL variables: " . $state;
//print isset($_POST['serial']) ? $_POST['serial'] : "<br />No Serial";
?>