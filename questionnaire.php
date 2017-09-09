<?php
$i = 0;
session_set_cookie_params(172800);
session_start(); 

require('core/config.php');

require('core/auth.php');

require('core/system.php');
require('core/dom.php');
require('core/image.php');
//error_reporting(E_ALL);

$auth = new Auth;
$system = new System;

$system->domain = $domain;
$system->db = $db;

$menu['settings'] = 'active';
$page['name'] = 'Matching Questionnaire';

if(!$auth->isLogged()) {
	header('Location: index.php');
	exit;
}

$user = $system->getUserInfo($_SESSION['user_id']);
$system->setUserActive($user->id);

$settings = $system->getSettings();

$payments = $db->query("SELECT * FROM transactions WHERE user_id='".$user->id."' AND status='1' LIMIT 5");

if(isset($_POST['save_1'])) {

    
    $marital_status = $system->secureField($_POST['marital_status']);
    $has_traveled = $system->secureField($_POST['has_traveled']);
    $where_traveled = $system->secureField($_POST['where_traveled']);
    $preferred_destination = $system->secureField($_POST['preferred_destination']);
    $cruising_or_touring = $system->secureField($_POST['cruising_or_touring']);
    $state_of_health = $system->secureField($_POST['state_of_health']);
    $active_or_slow_travel = $system->secureField($_POST['active_or_slow_travel']);
    $distance_to_travel = $system->secureField($_POST['distance_to_travel']);
    $spontaneous_or_itinerary = $system->secureField($_POST['spontaneous_or_itinerary']);
    $smoker = $system->secureField($_POST['smoker']);
    $accommodation_type = $system->secureField($_POST['accommodation_type']);
    $budget = $system->secureField($_POST['budget']);
    $luggage_type = $system->secureField($_POST['luggage_type']);
    $foodie = $system->secureField($_POST['foodie']);
    $alcohol = $system->secureField($_POST['alcohol']);
    


	$db->query("
		UPDATE users SET 
        
        marital_status='$marital_status',
        has_traveled='$has_traveled',
        where_traveled='$where_traveled',
        preferred_destination='$preferred_destination',
        cruising_or_touring='$cruising_or_touring',
        state_of_health='$state_of_health',
        active_or_slow_travel='$active_or_slow_travel',
        distance_to_travel='$distance_to_travel',
        spontaneous_or_itinerary='$spontaneous_or_itinerary',
        smoker='$smoker',
        accommodation_type='$accommodation_type',
        budget='$budget',
        luggage_type='$luggage_type',
        foodie='$foodie',
        alcohol='$alcohol'
		WHERE id='".$user->id."'");



	$_SESSION['language'] = $website_language;
	
	header('Location: questionnaire.php');
	exit;

}

if(isset($_POST['save_2'])) {

    
    
$rating_lounge_poolside_beach=$system->secureField($_POST['rating_lounge_poolside_beach']);
$rating_explore=$system->secureField($_POST['rating_explore']);
$rating_shopping=$system->secureField($_POST['rating_shopping']);
$rating_casino=$system->secureField($_POST['rating_casino']);
$rating_tours=$system->secureField($_POST['rating_tours']);
$rating_food=$system->secureField($_POST['rating_food']);
$rating_spa=$system->secureField($_POST['rating_spa']);
$rating_sports=$system->secureField($_POST['rating_sports']);
$rating_concerts=$system->secureField($_POST['rating_concerts']);
$group_or_independent=$system->secureField($_POST['group_or_independent']);
$small_or_mega_ship_cruising=$system->secureField($_POST['small_or_mega_ship_cruising']);
$active_or_sedentary=$system->secureField($_POST['active_or_sedentary']);
$primary_language=$system->secureField($_POST['primary_language']);

    


	$db->query("
		UPDATE users SET 
		rating_lounge_poolside_beach='$rating_lounge_poolside_beach',
        rating_explore='$rating_explore',
        rating_shopping='$rating_shopping',
        rating_casino='$rating_casino',
        rating_tours='$rating_tours',
        rating_food='$rating_food',
        rating_spa='$rating_spa',
        rating_sports='$rating_sports',
        rating_concerts='$rating_concerts',
        group_or_independent='$group_or_independent',
        small_or_mega_ship_cruising='$small_or_mega_ship_cruising',
        active_or_sedentary='$active_or_sedentary',
        primary_language='$primary_language'
		WHERE id='".$user->id."'");



	$_SESSION['language'] = $website_language;


	header('Location: questionnaire.php');
	exit;

}





require('inc/top.php');
require('layout/questionnaire.php');
require('inc/bottom.php');