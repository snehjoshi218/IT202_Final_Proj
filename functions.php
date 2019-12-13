<?php

function see ($u, $account){

	global $db; //variable from parent program
	
	$s = "select * from accounts where ucid='$u' and account='$account'";
	
	print "<hr>Account Info";
	print "<br>SQL statement is: $s<br>";
	($t = mysqli_query($db, $s)) or die (mysqli_error($db));
	while ( $r = mysqli_fetch_array ($t, MYSQLI_ASSOC)) {
		$id = $r["ucid"];
		$acc = $r["account"];
		$bal = $r["balance"];
		$rec = $r["recent"];
		if ($bal[0] == "-") {
			$no_neg_sign = substr($bal, 1);
			print "<br>ucid: $id || account: $acc || balance: $bal || recent : $rec";
		}
		else {
			print "<br>ucid: $id || account: $acc || balance: \$$bal || recent : $rec";
		}
	}
	
	print "<hr>Account Transactions";
	$s = "select * from xtransactions where ucid='$u' and account='$account'";
	print "<br>SQL statement is: $s<br>";

	($t = mysqli_query($db, $s)) or die (mysqli_error($db));
	$num = mysqli_num_rows($t);
	//print "Number of rows retrieved was $num <br>";

	while ( $r = mysqli_fetch_array ($t, MYSQLI_ASSOC)){

    $amount = $r["amount"];
    $timestamp = $r["timestamp"];
    $mail = $r["mail"];

    if ($amount[0] == "-") {
    $no_neg_sign = substr($amount, 1); 
    print "<br>amount: -\$$no_neg_sign || timestamp: $timestamp || mail: $mail";
	} else {
    print "<br>amount: \$$amount || timestamp: $timestamp || mail: $mail";
	}
	};
	print "<hr>";

}

//authenticate using ucid and password from users table
function authenticate ($u, $p){
	global $db, $t;
	$s = "select * from users where ucid='$u' and pass = '$p'";
	echo "<br>SQL credentials select statement is: $s<br>";

	($t = mysqli_query($db,$s) ) or die (mysqli_error($db));
	$num = mysqli_num_rows($t);
	//print "<br>num of rows was $num<br>";
	if ($num == 0) {   return false; }

	
}



function transact ( $u, $account, $amount) {
	global $db;
	
	echo "<hr><hr>Before Transaction: <br>";
	see($u, $account);
	
	//update accounts, if invalid account/overdraft, exit
	$s = "update accounts
		set balance = balance + '$amount', recent = NOW()
		where ucid = '$u' and account = '$account' and balance + '$amount' >=0";
	($t = mysqli_query($db, $s)) or die (mysqli_error($db));
	$num = mysqli_affected_rows($db);
    if ($num == 0) { echo "<br> Either overdraft or invalid account. Please try again."; return ;}
	echo "<hr>Transact Function SQL statements below: <br>";
	echo "SQL update statement is: $s ";
	
	//if no overdraft or invalid account, insert transaction
	$s = "insert into xtransactions values ('$u', '$account', '$amount', NOW(), 'N')";
	($t1 = mysqli_query($db, $s)) or die (mysqli_error($db));
	echo "<br>SQL insert statement is: $s ";
	
	//show details after transaction has occured
	echo "<br><hr><hr>After Transaction: <br>";
	see($u, $account);
;}
