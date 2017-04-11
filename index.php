<?php
session_start();
include_once 'include/UserClass.php';
$user = new User();
$uid = $_SESSION['uid'];
if (!$user->get_session()) 
{
	header("location:login.php");
}

if (isset($_GET['logout'])) 
{
	$user->user_logout();
	header("location:login.php");
}
?>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
Home
<div id="container">
<div id="header"><a href="index.php?logout=logout">LOGOUT</a></div>
<div id="main-body">
<h1>Name: <?php $user->get_fullname($uid); ?></h1>
<h1>Username: <?php $user->get_username($uid); ?></h1>
<h1>Email: <?php $user->get_email($uid); ?></h1>
</div>
<div id="footer"></div>
</div>
