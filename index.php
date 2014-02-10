<?php
	require_once 'Mobile_Detect.php';
	$detect = new Mobile_Detect;
	
	if ( $detect->isMobile() ) {
		include(mobile.php);
	}
	else
	{
		include(dekstop.php);
	}
?>