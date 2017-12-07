<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 12/5/2017
 * Time: 9:03 PM
 */

require "config/error_handling.php";
require "config/config.php";
require "lib/controller.php";
require "matchapp.php";
require "model/model.php";

$app = new MatchingCore\MatchingCoreWizard();
$app->run();
?>