<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'test');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 

$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 

/* $ID = $_POST['user']; $Password = $_POST['pass']; */

function SignIn()
{ 
session_start(); //starting the session for user profile page

if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-In.html, is it empty or have some text 

{
$query = mysql_query("SELECT * FROM users where user = '$_POST[user]' AND password = '$_POST[pass]'"); 

	$row = mysql_fetch_array($query);
	if(!empty($row['user']) AND !empty($row['password']))
{ 
	$_SESSION['user'] = $row['password']; 
	header("Location:menu.html");
	exit;
}

else 
	{ 
		echo "<script language=\"JavaScript\">\n";
		echo "alert('Username or Password was incorrect!');\n";
		echo "window.location='index.html'";
		echo "</script>";	
		exit;
	} 
} 

} 

		if(isset($_POST['submit'])) 
			{ 
				SignIn(); 
			} 

?>

