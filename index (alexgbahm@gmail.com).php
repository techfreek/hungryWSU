<!DOCTYPE html>

<html>
<head>
  <title>DrunkWSU</title>
  <script src="jquery.js"></script>
  <link href="pure.css" rel="stylesheet">
  <script src="script.js"></script>
  <script type="text/javascript">
	$(document).ready(function() {
		//closingTime();\
		updateTime();
		});
		
		/*if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			alert("Mobile!");
			//hideDetails();
		// some code..
		}*/
    </script>
	<!--<link href="desktop.css" rel="stylesheet">-->
	<link href="desktop.css" rel="stylesheet">
</head>

<body>
	<div id="content">
	<div id="logo"></div>
	<script>
		if(document.URL.indexOf("hungry") >= 0)
		{
			$( "div" ).each(function () {
				if($(this).is("#logo")) {
					$(this).css("background-image", "url('hungry.png')");
					document.title = "HungyWSU";
				}
			})
			$("div").each(function() {
				if($(this).is("affil")) {
					$(this).text("HungryWSU.com has absolutely no affiliation with WSU");
				}
			})
			/*if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
					if("#result").click(function() {
						$(this).parent().children("#details").toggle();
					})
			}*/
		}		
	</script>
	<!--<div id="drunk">Drunk<div class="WSU">WSU</div></div>-->
	<div id="tagLine">Let's face it, you're hungry. What's still open?</div>
			<div id="deliveryButton">Want it delivered?</div>
			
			<script>  
				$( "#deliveryButton" ).click(function() {filter();});
				setInterval(function(){updateTime()},60000); //This will be the update interval
		    </script>
			
			<div id="results">
				<div id="result">
					<!--Add timestamp that displays today's closing time-->
					<div id="summary" class="pure-g">
						<div class="pure-u-1-3"><div id="name">Red Robin</div></div>
						<div class="pure-u-1-3"><div class="yes">We'll deliver!</div></div>
						<div class="pure-u-1-3"><div id="type">Food</div></div>
					</div>
					<div id="details"  class="pure-g">
						<div class="pure-u-1-2"><div id="address" id="detail">123 ABC Street, Seattle, WA 98121</div></div>
						<div class="pure-u-1-2"><div id="phoneNum">Phone: (425) 417-5393</div></div>					
						<div class="pure-u-1"><div id="openTill" openHour="8" openMinute="00" closeHour="14" closeMinute="30"></div></div>
					</div>
				</div>
				<div id="result">
					<!--Add timestamp that displays today's closing time-->
					<div id="summary" class="pure-g">
						<div class="pure-u-1-3"><a href="https://maps.google.com/maps?q=46.74393,-117.154148" id="name">The Zzu</a></div>
						<div class="pure-u-1-3"><div class="yes">We'll deliver!</div></div>
						<div class="pure-u-1-3"><div id="type">Food</div></div>
					</div>
					<div id="details" class="pure-g">
						<div class="pure-u-1-2"><div id="address" id="detail">453 Merman St, Pullman, WA 98121</div></div>
						<div class="pure-u-1-2"><div id="phoneNum">Phone: (425) 345-2342</div></div>					
						<div class="pure-u-1"><div id="openTill" openHour="12" openMinute="00" closeHour="3" closeMinute="30"></div></div>
					</div>
				</div>
				<div id="result">
					<div id="summary" class="pure-g">
						<div class="pure-u-1-3"><div id="name">Jimmy Johns</div></div>
						<div class="pure-u-1-3"><div class="no">We don't deliver :(</div></div>
						<div class="pure-u-1-3"><div id="type">Food</div></div>
					</div>
					<div id="details"  class="pure-g">
						<div class="pure-u-1-2"><div id="address" id="detail">1920 Fail Dr, Failcity	, WA 99163</div></div>
						<div class="pure-u-1-2"><div id="phoneNum">Phone: (425) 234-4347</div></div>
						<div class="pure-u-1"><div id="openTill" openHour="8" openMinute="00" closeHour="19" closeMinute="30"></div></div>
					</div>
				</div>
				<div id="result">
					<div id="summary" class="pure-g">
						<div class="pure-u-1-3"><div id="name">McDonald's</div></div>
						<div class="pure-u-1-3"><div class="no">We don't deliver :(</div></div>
						<div class="pure-u-1-3"><div id="type">Food</div></div>
					</div>
					<div id="details"  class="pure-g">
						<div class="pure-u-1-2"><div id="address" id="detail">3392 Stadium Way Pullman, WA 99163</div></div>
						<div class="pure-u-1-2"><div id="phoneNum">Phone: (425) 674-7534</div></div>
						<div class="pure-u-1"><div id="openTill" id="openTill" openHour="8" openMinute="00" closeHour="20" closeMinute="30"></div></div>
					</div>
				</div>
				<div id="result">
					<div id="summary" class="pure-g">
						<div class="pure-u-1-3"><div id="name">Pizza Hut</div></div>
						<div class="pure-u-1-3"><div class="yes">We deliver</div></div>
						<div class="pure-u-1-3"><div id="type">Food</div></div>
					</div>
					<div id="details"  class="pure-g">
						<div class="pure-u-1-2"><div id="address" id="detail">3392 Main St Pullman, WA 99163</div></div>
						<div class="pure-u-1-2"><div id="phoneNum">Phone: (425) 564-2343</div></div>
						<div class="pure-u-1"><div id="openTill" openHour="1" openMinute="00" closeHour="24" closeMinute="00"></div></div>
					</div>
				</div>
		</div>
		
		
	<div id="footer">
		<div class="pure-g">
			<div class="pure-u-1">Created by Alex Bahm and Connor Jackson</div>
			<div class="pure-u-1"><div id="affil">DrunkWSU.com has absolutely no affiliation with WSU</div></div>
			<div class="pure-u-1"><h5>//Privacy Policy//</h5></div>
		</div>
	</div>
		
		
	</div>
	
</body>
</html>