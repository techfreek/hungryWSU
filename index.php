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
<?php
	require_once 'Mobile_Detect.php';
	$detect = new Mobile_Detect;
	if ( $detect->isMobile() ) {
		include('mobile.php');
	}
	else
	{
		include('desktop.php');
	}
?>
</body>
</html>
