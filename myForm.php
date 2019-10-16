<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function getName(){
	if(isset($_GET['name'])){
		echo "<p>Hello, " . $_GET['name'] . "</p>";
	}
}
function validatePasswords(){
	if(isset($_POST['password']) && isset($_POST['confirm'])){
		if($_POST['password'] == $_POST['confirm']){
			echo "<br>Passwords Matching!<br>";
		}
		else{
			echo "<br>Passwords did not match!<br>";
		}
	}
}
?>
<html>
<head>
<script>
function validation(){
	var form = document.forms[0];
	var password = form.password.value;
	var confirmation = form.confirmation.value;
	console.log(password);
	console.log(confirmation);
	if(password == confirmation){
		return true;
	}
	
	alert("Passwords do not match");
	return false;
	
}
</script>
</head>
<body><?php getName();?>
<form method="POST" action="#" onsubmit="return validation();">
<input name="name" type="text" placeholder="Enter your name"/>
<input type="password" name="password"/>
<input type="password" name="confirm"/>
	

<input type="submit" value="Submit"/>
</form>
</body>
</html>
<?php validatePasswords();?>
<?php
if(isset($_POST)){
	echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";
}
?>
