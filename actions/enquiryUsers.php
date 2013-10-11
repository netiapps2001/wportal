<?php
include_once('../includes/system/kickstart.php');
$firstname=$IO->fetchSystemVar('fname','post');
$lastname=$IO->fetchSystemVar('lname','post');
$mobile=$IO->fetchSystemVar('mobile','post');
$email=$IO->fetchSystemVar('email','post');
$IO->sendMail('newuser',$email);

?>
