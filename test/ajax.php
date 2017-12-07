<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 11/30/2017
 * Time: 5:04 PM
 */

if (isset($_POST['email'])){
    $email = filter_input(INPUT_POST,
        "email",
        FILTER_SANITIZE_EMAIL);
}
$wizard = isset($_GET['wizard']) ? $_GET['wizard'] : 1;
$wizard_data['email'] = $email;
$wizard_data['step'] = $wizard++;
$wizard_data['id'] = mt_rand(10000, 99999);
$wizard_data['remote_addr'] = $_SERVER['REMOTE_ADDR'];
$wizard_data['request_method'] = $_SERVER['REQUEST_METHOD'];
$wizard_data['request_uri'] = $_SERVER['REQUEST_URI'];
//$wizard_data['SERVER'] = $_SERVER;
$json_return = json_encode($wizard_data);
//echo var_dump($wizard_data);
echo $json_return;
?>