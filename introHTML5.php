<!DOCTYPE html>
<html>
<head>
<style>
p{color: blue;}
h1,h2{background-color: yellow;}
.myClassname
</style>
<script>
	function queryParam(){
		var params = new URLSearchParams(location.search);
		if(params.has('page')){
			var page = params.get('page');
			var ele = document.getElementById(page);
			if(ele){
				let home = document.getElementById('home');
				let about = document.getElementById('about');
				home.style.display="none";
				about.style.display = "none";
				ele.style.display = "block";
			}
		}
		else{
			let home = document.getElementById('home');
			home.style.display = "block";
		}
	}
</script>
</head>
<body onload="queryParam();">
	<header>
		<nav>
			<a routerLink="/page" routerLinkActive="active">Home</a>
			<!--Create route for About-->
		</nav>
	</header>
	<div id="home">
		This is home
	</div>
	<div id="about">
		<!-- About page using HTML5 Semantics-->
	</div>
	<footer></footer>
</body>
</html>
