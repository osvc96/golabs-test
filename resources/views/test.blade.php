<!DOCTYPE html>
<html>
<head>
	<title>Go-Labs Test</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"></head>

<?php
	if(!(isset($_COOKIE['cookie']))){
		setcookie('cookie', 0);
		$cookie = 0;
	}
	else{
		$cookie = $_COOKIE['cookie'];
	}

	function updateCookie(){
		setcookie('cookie', $cookie+1);
	}
 ?>
<body>
	<div>
	<style type="text/css">
		button{
			display:inline;
			margin-left: 15%;
		}
		p{
			display:block;
			margin-top: 5%;
			margin-left:15%;
		}
	</style>

		<p>Cookie</p>
		<button id="cookie">
			{{$cookie}}
		</button>

		<p>Sessions</p>
		<button id="session">
			0
		</button>
		
		{{ Form::open(['method'=>'PUT', 'route' => array('buttons.update', 1)]) }}
		<p>BD</p>
		<button type="submit" id="bd">
			{{$dbValue}}
		</button>	
		{{ Form::close()}}
		
		
		
		<p>LS</p>
		<button id="ls">
			0
		</button>
	</div>
</body>
</html>