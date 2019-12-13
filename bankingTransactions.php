<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title> Banking Transactions </title>
	<!--Ragavendra Ramesh-->
	<!--IT 201-->
<style>
body{background-color:powderblue}
</style>
<script>
var balance=1000;
var Transaction;</script>
</head>
<body>

<h1 style="background-color:darkblue; color:white"><center>Banking Transactions</center><h1>
<table border = "3" style="width=100%">
<hr>
	<tr>
		<th>Transactions</th>
		<th>Amount</th>
		<th>Final Balance</th>
		<th>Special Message</th>
	</tr>
<tr>
	<td><button id="calculate" onclick='Transaction="B" '>Balance</button></td>
	<td></td>
	<td><input style="background-color:black; color:green"type="text" id="finalBalance" onchange=''></td>
	<td><input type="text" id="messageBalance" onchange=''></td>
</tr>
<tr>
	<td><button id="DepositB" onclick='Transaction="D"'>Deposit</button></td>
	<td><input type="text" id="Deposit" onchange=' '></td>
	<td><input style="background-color:black; color:green"type="text" id="finalDeposit" onchange=''></td>
	<td><input type="text" id="messageDeposit" onchange=''></td>
</tr>
<tr>
	<td><button id="WithdrawalB" onclick='Transaction="W"'>Withdrawal</button></td>
	<td><input type="text" id="Withdrawal" onchange=' '></td>
	<td><input style="background-color:black; color:green"type="text" id="finalWithdrawal" onchange=''></td>
	<td><input type="text" id="messageWithdrawal" onchange=''></td>
</tr>
</table>

<p><button id="mybutton" onclick='


if(Transaction == "D")
{
	deposit = 1*Deposit.value;
	endBalance = balance + deposit;
	if(deposit >= 3000)
	{
		endBalance = deposit*1.05+balance;
		messageDeposit.value = "Pending : " + endBalance;
	}
	
	finalDeposit.value = endBalance;
}
else if(Transaction == "W")
{
	withdrawal = 1*Withdrawal.value;
	endBalance = balance - withdrawal;
	if(endBalance < 0)
	{
		messageWithdrawal.value = "Cannot Withdraw";
		finalWithdrawal.value = balance;
	}
	else if (balance-withdrawal <=300)
	{
		messageWithdrawal.value = "Warning: Low Balance" - endBalance;
		finalWithdrawal.value = endBalance;
	}
	else
	{
		finalWithdrawal.value = endBalance;
	}
	
	
}
else if(Transaction == "B")
{
	finalBalance.value = balance;
	
}

'>Process Transaction</button>
<button onclick = '

Transaction = "";
messageWithdrawal.value = "";
finalWithdrawal.value = "";
finalDeposit.value = "";
Deposit.value = "";
finalBalance.value = "";
Withdrawal.value = "";
messageDeposit.value = "";



'>
Clear Data </button>
</script>
</body>
</html>


