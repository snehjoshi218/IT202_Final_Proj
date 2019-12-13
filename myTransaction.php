<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function do_bank_action($account1, $account2, $amountChange, $type){
	require("config.php");
	$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
	$db = new PDO($conn_string, $username, $password);

	$select_query = "select SUM(amount) as amountTotal from xtransactions where accountSource = :account";
	$stmt = $db->prepare($select_query);
	$stmt->execute(array("account"=>$account1));
	$r1 = $stmt->fetch(PDO::FETCH_ASSOC);
	$a1total = $r1["amountTotal"];
	echo var_export($r1, true);
	$a1total += $amountChange;

	$stmt = $db->prepare($select_query);
	$stmt->execute(array(":account"=>$account2));
	$r2= $stmt->fetch(PDO::FETCH_ASSOC);
	$a2total = $r2["amountTotal"];
	echo var_export($r2, true);
	$a2total += $amountChange;	


	
	$query = "INSERT INTO `xtransactions` (`accountSource`, `accountDestination`, `amount`, `type`, `amountTotal`) 
	VALUES(:p1a1, :p1a2, :p1change, :type, :a1total), 
			(:p2a1, :p2a2, :p2change, :type, :a2total)";
	
	$stmt = $db->prepare($query);
	$stmt->bindValue(":p1a1", $account1);
	$stmt->bindValue(":p1a2", $account2);
	$stmt->bindValue(":p1change", $amountChange);
	$stmt->bindValue(":type", $type);
	$stmt->bindValue(":a1total", $a1total);
	//flip data for other half of transaction
	$stmt->bindValue(":p2a1", $account2);
	$stmt->bindValue(":p2a2", $account1);
	$stmt->bindValue(":p2change", ($amountChange*-1));
	$stmt->bindValue(":type", $type);
	$stmt->bindValue(":a2total", $a2total);
	$result = $stmt->execute();
	echo var_export($result, true);
	echo var_export($stmt->errorInfo(), true);
	return $result;
}
?>
<form method="POST">
	<input type="text" name="account1" placeholder="Account Number">
	<!-- If our sample is a transfer show other account field-->
	<?php if($_GET['type'] == 'transfer') : ?>
	<input type="text" name="account2" placeholder="Other Account Number">
	<?php endif; ?>
	
	<input type="number" name="amount" placeholder="$0.00"/>
	<input type="hidden" name="type" value="<?php echo $_GET['type'];?>"/>
	
	<!--Based on sample type change the submit button display-->
	<input type="submit" value="Move Money"/>
</form>

<?php
if(isset($_POST['type']) && isset($_POST['account1']) && isset($_POST['amount'])){
	$type = $_POST['type'];
	$amount = (int)$_POST['amount'];
	switch($type){
		case 'deposit':
			do_bank_action("000000000000", $_POST['account1'], ($amount * -1), $type);
			break;
		case 'withdraw':
			do_bank_action($_POST['account1'], "000000000000", ($amount * -1), $type);
			break;
		case 'transfer':
			do_bank_action($_POST['account1'], $_POST['account2'], ($amount * -1), $type);
			break;
	}
}
?>
