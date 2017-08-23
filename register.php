<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'test');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: ".mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$email= $_POST['email'];
$user = $_POST['user'];
$pass =  $_POST['pass'];

if(strpos($email,'@wingify.com')!==true)
{
echo "<script language=\"JavaScript\">\n";
echo "alert('Invalid email! Try again...');\n";
echo "window.location='register.html'";
echo "</script>";
exit;
}

$query = "INSERT INTO users (emailID,user,password) VALUES ('$email','$user','$pass')";
$data = mysql_query ($query)or die(mysql_error());
if($data)
{
echo "<script language=\"JavaScript\">\n";
echo "alert('Registration Completed! Now you can Log in');\n";
echo "window.location='index.html'";
echo "</script>";
exit;
}
else {
	echo "DB error....";
}

?>