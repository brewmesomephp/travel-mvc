<?php
session_set_cookie_params(172800);
session_start();
require('core/config.php');
require('core/auth.php');
require('core/system.php');
$auth = new Auth;
$system = new System;

$system->domain = $domain;
$system->db = $db;

$menu['visitors'] = 'active';
$page['name'] = 'Profile Visitors';

if(!$auth->isLogged()) {
	header('Location: index.php');
	exit;
}

$user = $system->getUserInfo($_SESSION['user_id']);
$system->setUserActive($user->id);

$settings = $system->getSettings();

$profile_visitors = $db->query("SELECT * FROM profile_views WHERE profile_id='".$user->id."' AND viewer_id != '".$user->id."' ORDER BY id DESC LIMIT 20");

require('inc/top.php');
require('layout/visitors.php');
require('inc/bottom.php');