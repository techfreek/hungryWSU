<!DOCTYPE html>

<html>
<head>
  <title>DrunkWSU</title>
  <meta name="keywords" content="Pullman, WSU, Cougs, Drunk, Hungry, munchies, drunchies, food, open, delivery">  
  <meta name="description" content="It's late, and you are hungry. So, what's still open in Pullman?">
  
  <link rel="shortcut icon" href="wsu.ico">
  <script src="jquery.js"></script>
  <link href="pure.css" rel="stylesheet">
  <script src="script.js"></script>
  <script type="text/javascript">
	
	$(document).ready(function() {
			//closingTime();
			updateTime();
			updateText();
			$( "#deliveryButton" ).click(function() {filter();});
			setInterval(function(){updateTime()},60000); //This will be the update interval
		});
    </script>
	<link href="desktop.css" rel="stylesheet">
</head>

<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<div id="content">
	<img id="logo" src="drunk.png"/>
	<script>
		
		if(( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) || $(window).width() < 600) {
			//var mobileURL = "http://m." + document.URL;
			//alert(mobileURL);
			//window.location = "mIndex.php";
			//alert("This will eventually redirect you");
		};
		//getLocation();
		updateImage();
	</script>
	
	<div id="tagLine">Let's face it, you're hungry. What's still open?</div>
			<div id="deliveryButton">Want it delivered?</div>

			<div id="facebookButton"><div class="fb-like" data-href="https://www.facebook.com/drunkWSU" data-layout="button_count" data-action="like" data-share="true" data-colorscheme="light" ></div></div>
			
			<div id="results">
			<!---
			<?php  
				/*$result = mysqli+query();
				
				while($restaurant = mysqli_fetch_array($result))
				{
					echo '<div class="result">;
					echo '<div id="summary" class="pure-g">';
					echo '<div class="pure-u-1-3"><div id="name"><a href="' . $restaurant['url'] . '">' . $restaurant['name'] . '</a></div></div>';
					if( $restaurant['deliver'] == true)
					{
						echo '<div class="pure-u-1-3"><div class="yes">We\'ll deliver!</div></div>';
					}
					else
					{
						echo '<div class="pure-u-1-3"><div class="no">We don\'t deliver :(</div></div>';
					}
					echo '<div class="pure-u-1-3"><div id="' . $restaurant['category'] . '">' . $restaurant['category'] . '</div</div>';
					echo '</div>';
					echo '<div class="details">';
					echo '<div class="pure-g">';
					echo '<div class="pure-u-1-2"><div id="address" id="detail><a href="http://maps.google.com/maps?ie=UTF-8&amp;hl=en&amp;q=' . str_replace(' ', '+', $restaurant['street']) . '%0A' . $restaurant['city'] . '%2C+' . $restaurant['state'] . '+' . $restaurant['zip'] .'">' . $restaurant['street'] . ', ' . $restaurant['city'] . ', ' . $restaurant['state'] . ' ' . $restaurant['zip'] . '</a></div></div>';
					echo '<div class="pure-u-1-2"><div id="phoneNum">Phone: ' . $restaurant['phone'] . '</div></div>';
					echo '<div class="pure-u-1-2"><div id="openTill" openHour="' . $restaurant['openHour'] . '" openMinute="' . $restaurant['openMinute'] . '" closeHour="' . $restaurant['closeHour'] . '" closeMinute="' . $restaurant['closeMinute'] . '"></div></div>';
					echo '</div>';
					echo '</div>'
					echo '</div>';
				}
			*/?>
			-->
			
				<div class="result">
					<!--Add timestamp that displays today's closing time-->
					<div class="summary">
						<div class="pure-g">
							<div class="pure-u-1-3"><div id="name"><a href="http://www.redrobin.com/">Red Robin</a></div></div>
							<div class="pure-u-1-3"><div class="yes">We'll deliver!</div></div>
							<div class="pure-u-1-3"><div id="type">Food</div></div>
						</div>
					</div>
					<div class="details">
						<div class="pure-g">
							<div class="pure-u-1-2"><div id="address" id="detail"><a href="http://maps.google.com/maps?ie=UTF-8&amp;hl=en&amp;q=1525+NE+Merman+Drive%0APullman%2C+WA+98121">123 ABC Street, Seattle, WA 98121	</a></div></div>
							<div class="pure-u-1-2"><div id="phoneNum">Phone: (425) 417-5393</div></div>					
							<div class="pure-u-1"><div id="openTill" openHour="8" openMinute="00" closeHour="2" closeMinute="30"></div></div>
						</div>
					</div>
				</div>
				<div class="result">
					<!--Add timestamp that displays today's closing time-->
					<div class="summary">
						<div class="pure-g">
							<div class="pure-u-1-3"><div id="name"><a href="http://www.zzubarandgrill.com/">The Zzu</a></div></div>
							<div class="pure-u-1-3"><div class="yes">We'll deliver!</div></div>
							<div class="pure-u-1-3"><div id="type">Food</div></div>
						</div>
					</div>
					<div class="details">
						<div class="pure-g">
							<div class="pure-u-1-2"><div id="address" id="detail">453 Merman St, Pullman, WA 98121</div></div>
							<div class="pure-u-1-2"><div id="phoneNum">Phone: (425) 345-2342</div></div>					
							<div class="pure-u-1"><div id="openTill" openHour="12" openMinute="00" closeHour="3" closeMinute="30"></div></div>
						</div>
					</div>
				</div>
				<div class="result">
					<div class="summary">
						<div class="pure-g">
							<div class="pure-u-1-3"><div id="name">Jimmy Johns</div></div>
							<div class="pure-u-1-3"><div class="no">We don't deliver</div></div>
							<div class="pure-u-1-3"><div id="type">Food</div></div>
						</div>
					</div>
					<div class="details">
						<div class="pure-g">
							<div class="pure-u-1-2"><div id="address" id="detail">1920 Fail Dr, Failcity	, WA 99163</div></div>
							<div class="pure-u-1-2"><div id="phoneNum">Phone: (425) 234-4347</div></div>
							<div class="pure-u-1"><div id="openTill" openHour="8" openMinute="00" closeHour="22" closeMinute="30"></div></div>
						</div>
					</div>
				</div>
				<div class="result">
					<div class="summary">
						<div class="pure-g">
							<div class="pure-u-1-3"><div id="name">McDonald's</div></div>
							<div class="pure-u-1-3"><div class="no">We don't deliver</div></div>
							<div class="pure-u-1-3"><div id="type">Food</div></div>
						</div>
					</div>
					<div class="details">
						<div class="pure-g">
							<div class="pure-u-1-2"><div id="address" id="detail">3392 Stadium Way Pullman, WA 99163</div></div>
							<div class="pure-u-1-2"><div id="phoneNum">Phone: (425) 674-7534</div></div>
							<div class="pure-u-1"><div id="openTill" id="openTill" openHour="8" openMinute="00" closeHour="24" closeMinute="30"></div></div>
						</div>
					</div>
				</div>
				<div class="result">
					<div class="summary">
						<div class="pure-g">
							<div class="pure-u-1-3"><div id="name">Pizza Hut</div></div>
							<div class="pure-u-1-3"><div class="yes">We deliver</div></div>
							<div class="pure-u-1-3"><div id="type">Food</div></div>
						</div>
					</div>
					<div class="details">
						<div class="pure-g">
							<div class="pure-u-1-2"><div id="address" id="detail">3392 Main St Pullman, WA 99163</div></div>
							<div class="pure-u-1-2"><div id="phoneNum">Phone: (425) 564-2343</div></div>
							<div class="pure-u-1"><div id="openTill" openHour="1" openMinute="00" closeHour="24" closeMinute="00"></div></div>
						</div>
					</div>
				</div>
		</div>
		
	<?php include 'footer.php'; ?>	
			
	</div>
	
</body>
</html>
