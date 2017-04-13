<?php
include_once 'include/UserClass.php';
$user = new User();

// checking logged in or not
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Secure Registration</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  	<body>
  		<div class="container">
  			<?php
  				if (isset($_REQUEST['submit'])) 
				{
					extract($_REQUEST);
					$register = $user->reg_user($fullname, $uname, $upass, $uemail);
					if ($register) 
					{
						// Registration success
						?>
							<p class="bg-success" style="border-radius: 10px;margin-top: 20px;padding: 24px;">Registration successful <a href='login.php'>Click here</a> to login</p>
						<?php
					}
					else
					{
						?>
							<p class="bg-danger" style="border-radius: 10px;margin-top: 20px;padding: 24px;">Registration faild</p>
						<?php
					}
				}
  			?>
			<h1>Registration Form</h1>
			<form class="form-horizontal" action="" method="post" name="reg">
				<div class="form-group">
				    <label class="col-sm-2 control-label">Full Name:</label>
				    <div class="col-sm-3">
				      <input type="text" class="form-control" name="fullname" placeholder="Full Name" required>
				    </div>
				 </div>
				 
				 <div class="form-group">
				    <label class="col-sm-2 control-label">User Name:</label>
				    <div class="col-sm-3">
				      <input type="text" class="form-control" name="uname" placeholder="Username" required>
				    </div>
				 </div>
				 
				 <div class="form-group">
				    <label class="col-sm-2 control-label">Email:</label>
				    <div class="col-sm-3">
				      <input type="text" class="form-control" name="uemail" placeholder="Email" required>
				    </div>
				 </div>
				 
				 <div class="form-group">
				    <label class="col-sm-2 control-label">Password:</label>
				    <div class="col-sm-3">
				      <input type="password" class="form-control" name="upass" placeholder="Password" required>
				    </div>
				 </div>
			  		
		  		<div class="form-group">
				    <div class="col-sm-3 col-sm-offset-2">
				      <button onclick="return(submitreg());" type="submit" name="submit" class="btn btn-primary">Register</button>
				      <br>
				      <a href="login.php">Already registered! Click Here!</a>
				    </div>
				</div>
			</form>
		</div>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	</body>
</html>
<script type="text/javascript" language="javascript">
	function submitreg() {
		var form = document.reg;
	 	if(form.name.value == ""){
	 		alert( "Enter name." );
	 		return false;
	 	}
	 	else if(form.uname.value == ""){
	 		alert( "Enter username." );
	 		return false;
	 	}
	 	else if(form.upass.value == ""){
	 		alert( "Enter password." );
	 		return false;
	 	}
	 	else if(form.uemail.value == ""){
	 		alert( "Enter email." );
	 		return false;
	 	}
	}
</script>

