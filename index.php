<! DOCTYPE html>

<html>
<head>
  <title>DrunkWSU</title>
  <meta name="keywords" content="Pullman, WSU, Cougs, Drunk, Hungry, munchies, drunchies, food, open, delivery">
  <meta name="description" content="It's late, and you are hungry. So, what's still open in Pullman?">

  <link rel="shortcut icon" href="wsu.ico">
  <script src="jquery.js"></script>
  <link href="pure.css" rel="stylesheet">
  <script src="script.js"></script>
  <?php
	error_reporting(E_ALL);
	require_once 'Mobile_Detect.php';
	$detect = new Mobile_Detect;
	if( $detect->isMobile() ) {
		echo '<link href="mobile.css" rel="stylesheet">';
	}
	else {
		echo '<link href="desktop.css" rel="stylesheet">';
	}
  ?>
</head>

<body>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-47962628-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	<div id="fb-root"></div>
        <script>
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>

	<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-47962628-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

	</script>
	
	<div id="content">
	<img id="logo" src="drunk.png"/>
	<?php
		//error_reporting(E_ALL);
		require_once 'Mobile_Detect.php';
                $detect = new Mobile_Detect;
		echo '<script>';
		echo '$(document).ready(function() {';
		echo '$( "#deliveryButton" ).click(function() {filter();});';
                echo 'updateTime();';
                echo 'updateText();';
		if( $detect->isMobile() ) {
			echo 'closingTime();';
			echo 'mobileDetails();';
			echo 'hideDetails();';
		}
		else
		{
			echo 'setInterval(function(){updateTime()},60000);';
		}
		echo '});';
		echo 'updateImage();';
		echo '</script>';
		echo '<div id="tagLine">Let\'s face it, you\'re hungry. What\'s still open?</div>';
		echo '<div id="deliveryButton"><div id="deliveryText">Want it delivered?</div></div>';
		if(!( $detect->isMobile()) ) {
			echo '<div id="facebookButton"><div class="fb-like" data-href="https://www.facebook.com/drunkWSU" data-layout="button_count" data-action="like" data-share="true" data-colorscheme="light" ></div></div>';

		}
	?>

	<div id="results">
	<?php

		include("time.php");
		$db_conn = parse_ini_file("../config.ini");
		date_default_timezone_set('America/Los_Angeles');
		$date = date('m/d/Y h:i:s a', time());				
		//print_r($date);

		$day = date("w");
		$hour= date("H");
		$min = date("i");

		try 
		{
			$db = new PDO("mysql:host=$db_conn[DBHOST];dbname=$db_conn[DBNAME]", $db_conn[DBUSER], $db_conn[DBPASS]);
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

		$query = "SELECT * 
					FROM location
					INNER JOIN times
					ON location.id = times.location
					WHERE day = $day
					ORDER BY sponsored DESC, uuid()";
							
		$results = $db->query($query);
		
		require_once 'Mobile_Detect.php';
                $detect = new Mobile_Detect;

		if ($detect->isMobile() ) {
			include('mobile.php');
		}
		else
		{
			echo 'almost desktop';
			include('desktop.php');
		}
		include 'footer.php';
	?>
</div>

</body>
</html>
