<?php

print "Hey! Welcome to my website!<br><br>";
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

//seperate file for functions
include ("functions.php") ;

//connect to database
include ("config.php") ;
$db = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();}
print "Successfully connected to MySQL.<br><br>";
mysqli_select_db( $db, $database );
print ("<hr>");


?>



<!DOCTYPE html>
<form action = "bankingTransaction.php">

<style>
	div { border: 2px solid red; width : 50%; padding: 10px; }	
</style>

<input type=text name="ucid"  	 value="<?php  print $u;?>" >Enter ucid<br><br>
<input type=text name="pass"     value="<?php  print $p;?>" >Enter password<br><br>
<input type=text name="account"  value="<?php echo $account; ?>" >Enter account<br><br>
<select name="choice" id="choice">
    <option value = "choose">Choose a service </option>
    <option value = "see">See</option>
    <option value = "transact">Transact</option>
</select>
<br>
<div id = "transact">
<input type=text name = "transactAmt" id="transactAmt" value="<?php print $amount;?>"> Enter Amount:<br><br>
</div>

<script>

var ptrTransact = document.getElementById( "transact" )


function G() { 
	if (ptrChoice.value == "transact") {
		ptrTransact.style.display = "block"
	}
	else if ( ptrChoice.value != "transact") {
		ptrTransact.style.display = "none"	}	
}
</script>

<input type=submit>
</form>

</html>

