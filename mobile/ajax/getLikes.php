<?php
define('IS_MOBILE_AJAX',true);
session_set_cookie_params(172800);
session_start();
require('../../core/config.php');
require('../../core/auth.php');
require('../../core/system.php');
require('../../core/geo.php');
$auth = new Auth;
$system = new System;

$system->domain = $domain;
$system->db = $db;

$user = $system->getUserInfo($_SESSION['user_id']);
$system->setUserActive($user->id);

$profile_likes = $db->query("SELECT * FROM profile_likes WHERE profile_id='".$user->id."' AND viewer_id != '".$user->id."' ORDER BY id DESC LIMIT 20");

if($profile_likes->num_rows >= 1) {
while($profile_like = $profile_likes->fetch_object()) { 
	$profile = $system->getUserInfo($profile_like->viewer_id);
	echo '
	<div class="visitor">
	<a href="user.php?id='.$profile->id.'" data-load="1">
	<img src="'.$system->getProfilePicture($profile).'" class="visitor-photo">
	<div class="visitor-info">
	'.$system->getFirstName($profile->full_name).'
	</div>
	</a>
	</div>
	';
}
} else {
	echo '
	<div class="page-error">
	<img src="'.$system->getDomain().'/img/icons/heart.png">
	<h4> No new likes </h4>
	<p> No new users have liked you, <br> please try again later </p>
	</div>
	';
}