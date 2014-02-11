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
