<?php
if(empty($_GET["city"])) {
	
	$error = "Pls type your city name";
	
}else {
if(isset($_GET["city"]) and !empty($_GET["city"])) {
	
	$file_content = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$_GET["city"].",uk&appid={{API KEY}}");
	$weather_array = JSON_decode($file_content,true);
    $weather_description = "Latitude of " .$_GET["city"]." is ".$weather_array["coord"]["lat"]." and Longitude is ".$weather_array["coord"]["lon"]." Tempature is : ".$weather_array["main"]["temp"]." degree and "." humidity is : ".
	$weather_array["main"]["humidity"]." Pressure is : ".$weather_array["main"]["pressure"]." Wind speed is :".$weather_array["wind"]["speed"];

		//paste your API key in {{API KEY}}
	}
}

?>
<!doctype html>
<html>
<head>
	<title>Weather</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
	*{padding:0px;
	margin:0px;}
		body{
			background-image:url("kalen-emsley-100238.JPG");
			background-size:cover;
			background-attachment:fixed;
			
		}
		.container .jumbotron {
			text-align:center;
			background-color:transparent;
			margin-top:90px;
			
		}
		#weather {
			margin-top:13px;
		}
		footer.jumbotron {
			background-color:lightgrey;
		}
		
		h2 {
			text-align:center;
		}
		
		p {
			font-size:23px;
			text-align:center;
			margin-top:160px;
		
			
		}
		
		
		
	</style>
</head>
<body>

<div class="container">
	<div class="jumbotron">
		<h1>Weather of your city</h1>
		<small>enter your city name</small>
		<form method="GET">
		<div class="form-group">
			<input class="form-control" type="text" name="city" placeholder="E.g-Tokyo,Diu"/>
		</div>
			<input class="btn btn-default" type="submit" value="Submit">
		</form>
		<div id="weather">
		<?php if (empty($_GET["city"])) {
			echo "<div class='alert alert-danger'>".$error."</div>" ;
		}else {
			echo "<div class='alert alert-success'>".$weather_description."</div>";
		}
		
		?>
		</div>
	</div>
	<p>&copy; Designed and developed by <a href="yashrajphotography.tk">Yashraj basan</a></p>
</div>

</body>
</html>
