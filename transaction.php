<html>
<head>

<style>
input { border: 1px solid black; }
.error {border: 1px solid red; }
.noerror {border: 1px solid black; }

</style>

</head>

<body>
 Hello, <?php echo $_SESSION['user']['name'];?>
<br></br>

	<a href="https://web.njit.edu/~rr543/IT202-007/myTransaction.php?type=deposit">Deposit</a> |
	<a href="https://web.njit.edu/~rr543/IT202-007/myTransaction.php?type=withdraw">Withdraw</a> |
	<a href="https://web.njit.edu/~rr543/IT202-007/myTransaction.php?type=transfer">Transfer</a> |

</body>

</html>

<?php checkPasswrods();?>

<?php

if(isset($_POST)){

	echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";

}

?>
