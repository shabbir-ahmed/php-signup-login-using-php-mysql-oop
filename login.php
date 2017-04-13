<?php
session_start();
include_once 'include/UserClass.php';
$user = new User();

/*if(isset($_REQUEST['submit']))
{
	extract($_REQUEST);
	$login = $user->check_login($emailusername, $password);
	if($login)
	{
		// Registration success
		header("location:index.php");
	}
	else
	{
		// Registration faild
		echo "Wrong user or password";
	}
}*/
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Simple Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
  	<div class="container">
  		<?php
  				if (isset($_REQUEST['submit'])) 
				{
					extract($_REQUEST);
					$login = $user->check_login($emailusername, $password);
					if($login)
					{
						// Login success
						header("location:index.php");
					}
					else
					{
						?>
							<p class="bg-danger" style="border-radius: 10px;margin-top: 20px;padding: 24px;">Wrong user or password</p>
						<?php
					}
				}
  			?>
	    <h1>Login Here</h1>
		<form class="form-horizontal" action="" method="post" name="login">
			<div class="form-group">
			    <label class="col-sm-2 control-label">UserName or Email:</label>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" name="emailusername" placeholder="UserName or Email" required>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-3">
			      <input type="password" class="form-control" name="password" placeholder="Password" required>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <div class="col-sm-2 col-sm-offset-2">
			      <button onclick="return(submitlogin());" type="submit" name="submit" class="btn btn-default">Login</button>
			      <br>
			      <a href="signup.php">Register new user</a>
			    </div>
			  </div>
		</form>
	</div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </body>
</html>

<script type="text/javascript" language="javascript">
    function submitlogin() {
        var form = document.login;
		if(form.emailusername.value == ""){
			alert( "Enter email or username." );
			return false;
		}
		else if(form.password.value == ""){
			alert( "Enter password." );
			return false;
		}
	}

</script>