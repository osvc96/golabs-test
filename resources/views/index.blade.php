<!DOCTYPE html>
<html>
<head>
	<title>Go-Labs Test</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"></head>

<?php
	
	$dbValue = DB::table('test')->first()->value;

	if(!(isset($_COOKIE['cookieVal']))){
		setcookie('cookieVal', 0);
		$cookie = 0;
	}
	else{
		setcookie('cookieVal', 0);
		$cookie = $_COOKIE['cookieVal'];
	}
	$sesVal = Session::get('sesVal');

	if (!(Storage::disk('local')->exists('file.txt'))){
		Storage::disk('local')->put('file.txt', 0);
	}

	$lsVal = Storage::disk('local')->get('file.txt');

	//echo "<script> alert(".$cookie.")</script>";

	echo $cookie;
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

		{{ Form::open(['action' => 'buttonController@cookiebtn'])}}
		<p>Cookie</p>
		<button id="cookie">
			{{$cookie}}
		</button>
		{{ Form::close()}}

		{{ Form::open(['action' => 'buttonController@sesbtn'])}}
		<p>Sessions</p>
		<button id="session">
			{{$sesVal}}
		</button>
		{{ Form::close()}}
		
		{{ Form::open(['method'=>'PUT', 'route' => array('buttons.update', 1)]) }}
		<p>BD</p>
		<button type="submit" id="bd">
			{{$dbValue}}
		</button>	
		{{ Form::close()}}
		
		{{ Form::open(['action' => 'buttonController@lsbtn'])}}
		<p>LS</p>
		<button id="ls">
			{{$lsVal}}
		</button>
		{{ Form::close()}}
	</div>
</body>
</html>