<?php
session_start();
?>
<html>
<head>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
	var nav = ["Home", "Transactions", "Logout"];
	let ul = $("<ul>");
	$("body").append(ul);
	nav.forEach(function(item, index){
			let ele = $("<a>");
			//?page   <- GET variable
			//#page   <-inline link/scroll to
			//page.php <-relative link to separate page
			ele.attr("href", "?page="+item);
			ele.text(item);
			ul.append($("<li>").append(ele[0]));
	});
	
	 /*$.ajax({
			url: "ajax/get.php", 
			method: "POST", 
			data: {"type":"login", "username":"bob", "password":"1234"}, 
			success: function(result){
					console.log(result);
					alert(result);
					result = JSON.parse(result);
					alert("Status: " + result.status);
			},
			fail: function(jqXHR, textStatus){
				console.log(jqXHR, textStatus);
			}
		});*/
});
</script>
</head>
<body>
Welcome to my E-Bank <?php echo $_SESSION['user']['name'];?>
<br></br>	
	<a href="transaction.php">Transactions</a>  &nbsp  |  &nbsp
	<a href="myLoginPage.php">Logout</a>  &nbsp  |  &nbsp
       </ul>

</body>
</html>
