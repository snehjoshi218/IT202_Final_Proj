<html>
<head>

	<script>
	function pageLoaded(){
	
	let myDiv = document.createElement('div');
	myDiv.innerText = "Created by JS";

	let text = document.createElement('div');
	myDiv.appendChild(text);
	
	document.body.appendChild(myDiv);
	document.body.appendChild(document.createElement('div')
		.appendChild(document.createTextNode("Try me")));

	}
	</script>
</head>
<body onLoad="pageLoaded();">

	<p id="myPara">Just showing that we loaded something...</p>
