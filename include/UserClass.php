<?php
include('config.php');

class User
{
	public $db;

	public function __construct()
	{
		$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE, PORT);

		// Check Database connection
		if(mysqli_connect_errno())
		{
			echo "Error: Could not connect to database.";
			exit;
		}
	}

	/*For registration proccess*/
	public function reg_user($name, $username, $password, $email)
	{
		$password = md5($password);
		$sql = "SELECT * FROM users WHERE uname = '$username' OR uemail = '$email' ";

		// Checking if username or emails is available in db
		$check = $this->db->query($sql);
		$count_row = $check->num_rows;

		// if the username is not available in db then insert to the table
		if($count_row == 0)
		{
			$sql1 = "INSERT INTO users (uname,upass,fullname,uemail) VALUES ('$username','$password','$name','$email')";
			$result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno()."Data not inserted");
			return $result;
		}
		else
		{
			return false;
		}
	}

	// For login proccess
	public function check_login($emailusername, $password)
	{
		$password = md5($password);
		$sql2 = "SELECT uid from users WHERE uemail = '$emailusername' or uname = '$emailusername' and upass = '$password' ";
		// Checking if the username is available in the table
		$result = mysqli_query($this->db, $sql2);
		$user_data = mysqli_fetch_array($result);
		$count_row = $result->num_rows;

		if($count_row == 1)
		{
			// This login var will use the session thing
			$_SESSION['login'] = true;
			$_SESSION['uid'] = $user_data['uid'];
			return true;
		}
		else
		{
			return false;
		}
	}

	// For showing username or fullname
	public function get_fullname($uid)
	{
		$sql3 = "SELECT fullname FROM users WHERE uid = $uid";
		$result = mysqli_query($this->db, $sql3);
		$user_data = mysqli_fetch_array($result);
		echo $user_data['fullname']; 
	}

	public function get_username($uid)
	{
		$sql3 = "SELECT uname FROM users WHERE uid = $uid";
		$result = mysqli_query($this->db, $sql3);
		$user_data = mysqli_fetch_array($result);
		echo $user_data['uname']; 
	}

	public function get_email($uid)
	{
		$sql3 = "SELECT uemail FROM users WHERE uid = $uid";
		$result = mysqli_query($this->db, $sql3);
		$user_data = mysqli_fetch_array($result);
		echo $user_data['uemail']; 
	}

	// Starting session
	public function get_session()
	{
		return $_SESSION['login'];
	}
	public function user_logout()
	{
		$_SESSION['login'] = FALSE;
		session_destroy();
	}
}
?>