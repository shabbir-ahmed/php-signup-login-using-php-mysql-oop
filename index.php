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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php $user->get_fullname($uid); ?> || Registration & Login Example</title>

    <!-- Bootstrap core CSS -->
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Home</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="">Home</a></li>
            <li><a href="index.php?logout=logout">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Registration & Login example</h1>
        <p>This is a template showcasing the optional theme stylesheet included in Bootstrap. Use it as a starting point to create something more unique by building on or modifying it.</p>
      </div>


      <div class="page-header">
        <h1>Profile</h1>
      </div>
      <div class="row">
        <div class="col-md-6">
          <table class="table">
            <thead>
              <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Username</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php $user->get_fullname($uid); ?></td>
                <td><?php $user->get_email($uid); ?></td>
                <td><?php $user->get_username($uid); ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </body>
</html>



<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
Home
<div id="container">
<div id="header"><a href="index.php?logout=logout">LOGOUT</a></div>
<div id="main-body">
<h1>Name: <?php $user->get_fullname($uid); ?></h1>
<h1>Username: <?php $user->get_username($uid); ?></h1>
<h1>Email: <?php $user->get_email($uid); ?></h1>
</div>
<div id="footer"></div>
</div>-->
