<?php
	echo "<pre>" . var_dump($_GET, true) . "</pre>";

	if(isset($_GET['name'])){
		echo "<br>Hello, " , $_GET['name'] , "<br>";
		echo "<br>but it might not be<br>";
	}
	//TODO
	//handle addition of 2 or more parameters with proper number parsing
	//concatenate 2 or more paramater values and echo them 
	//try passing multiple same-named parameters with different values 
	//try passing a parameter value with special characters 

	//web.njit.edu/~ucid/IT202/handleRequestData.php?parameter1=a&p2=b
?>
