<?php
define('IS_AJAX', true);
session_set_cookie_params(172800);
session_start();
require('../core/config.php');
require('../core/auth.php');
require('../core/system.php');

$system = new System;
$system->domain = $domain;
$system->db = $db;

$user = $system->getUserInfo($_SESSION['user_id']);
$user2 = $db->real_escape_string($_GET['receiver_id']);
$message = $db->real_escape_string($_GET['msg']);

$system->setUserActive($user->id);

$db->query("INSERT INTO messages (message,user1,user2,is_sticker,is_photo,sticker_id,time) VALUES ('".$message."','".$user->id."','".$user2."','0','0','0','".time()."')");
$db->query("INSERT INTO notifications (receiver_id,url,content,icon,time) VALUES ('".$user2."','user/".$user->id."','<b>".$system->getFirstName($user->full_name)."</b> messaged you','icon icon-bubble', '".time()."')");

$messages = $db->query("SELECT * FROM messages WHERE (user1='".$user->id."' AND user2='".$user2."') OR (user1='".$user2."' AND user2='".$user->id."') ORDER BY id ASC");

while($message = $messages->fetch_object()) {
	$sender = $system->getUserInfo($message->user1);
	if($message->is_sticker == 1) {
	$sticker = $db->query("SELECT id,pack_id,path FROM stickers WHERE id='".$message->sticker_id."'");
	$sticker = $sticker->fetch_object();
	echo '
	<div class="chat-message">
	<img src="'.$system->getProfilePicture($sender).'" class="chat-content-thumb img-circle pull-left">
	<p class="chat-content-username text-muted"> '.$system->getFirstName($sender->full_name).' </p>
	<p class="chat-content-text"> <img src="'.$system->getDomain().'/img/stickers/'.$sticker->pack_id.'/'.$sticker->path.'" class="sticker-chat"> </p>
	</div>
	';
	} else {
	echo '
	<div class="chat-message">
	<img src="'.$system->getProfilePicture($sender).'" class="chat-content-thumb img-circle pull-left">
	<p class="chat-content-username text-muted"> '.$system->getFirstName($sender->full_name).' </p>
	<p class="chat-content-text"> '.$message->message.' </p>
	</div>
	';
	}
}
