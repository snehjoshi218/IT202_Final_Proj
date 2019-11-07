<?php 
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

include ("account.php");
$db = mysqli_connect($hostname, $username, $password, $project);
if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();}
print "Successfully connected to MySQL.<br><br>";
mysqli_select_db( $db, $project );
include("session-functions.php");

echo "hello";

$ucid = $_GET["ucid"];    echo "<br>ucid is: $ucid<br>";
$pass = $_GET["password"];    echo "<br>pass is: $pass<br>";
$delay = $_GET["delay"];  echo "<br>delay is: $delay<br>";
$guess = $_GET["guess"];  echo "<br>guess is: $guess<br>";

//check captcha
$captcha = $_SESSION["captcha"];
$captcha = "what";

if ($guess != $captcha )
{
	echo "Wrong captcha guess<br>";
	header ("refresh: $delay , url = 'login.html'");
	exit();
}

if (!authenticate($ucid, $pass))
{
	echo "Wrong CRED<br>";
	header ("refresh: $delay , url = 'login.html'");
	exit();
}

$_SESSION["logged"] = true;
$_SESSION["ucid"] = $ucid;
header ("refresh: $delay , url = 'redirect1.php'");
exit();



echo "<br>passed auth";

//check credentials


//login


?>
