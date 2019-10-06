<?php
//helper
function getName(){
	if(isset($_GET['name'])){
		echo "<p>Hello, " . $_GET['name'] . "</p>";
	}
}
?>
<html>
<head></head>
<body>
<?php getName();?>
<form mode="GET" action="#">
<input name="username" type="text" placeholder="Enter your username"/>
<input name="password" type="password" placeholder= "Enter your password"/>
<input name="password" type="password" placeholder= "Confirm your password"/>
<input type="submit" value="Submit"/>
</form>
</body>
</html>
