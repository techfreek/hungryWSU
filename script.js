function filter() {
	if($("#deliveryButton").text() == "Want it delivered?")
	{
		$("#deliveryButton").text("Don't care for delivery?");
	}
	else
	{
		$("#deliveryButton").text("Want it delivered?");
	}
	$( "div" ).each(function () {
		if($(this).is('.result')) {	
			if($(this).find(".no").length > 0) {	
				$(this).slideToggle(600);
				//$(this).toggle(400);
			}
		}
	});
}

function updateImage()
{
	if(document.URL.indexOf("hungry") >= 0)
	{
		var image = new Image();
		image.src = "hungry.png";
		if(image.height == 0)
		{
			document.getElementById("logo").src="../hungry.png";		
		}
		else
		{
			document.getElementById("logo").src="hungry.png";
		}
	}		
}

function updateText()
{
	if(document.URL.indexOf("hungry") >= 0)
		{
			document.title = "HungyWSU";
			$( "div" ).each(function () {
				if($(this).is("#affil")) {
					$(this).text("HungryWSU.com has no affiliation with WSU");
				}
			})
		}		
}

function closingTime(timeTillClose) {
	$( "div" ).each(function () {
		if($(this).is('#openTill')) {	
			var openHour = parseInt($(this).attr('openHour'), 10);
			var closeHour = parseInt($(this).attr('closeHour'), 10);
			var closeMin = parseInt($(this).attr('closeMinute'), 10);
			
			if(openHour > closeHour)
			{
				closeHour += 24;
			}

			var timeTillClose = calculateTime(closeHour, closeMin);
			
			//alert("TimeTillClose: " + timeTillClose);
			
			if(timeTillClose[1] < 1){	
				$(this).css("color", "red");
			}
			/*else if(timeTillClose[1] > 9 ) {
				$(this).css("color", "#32C14C");
			}*/
			else
			{
				$(this).css("color", "#000");
			}
		}
	});
}

function updateTime() {
	//update time code//
	var currentTime = dateTime();
	$( "div" ).each(function () {
		if($(this).is('#openTill')) {
			var openHour = parseInt($(this).attr('openHour'), 10);
			var closeHour = parseInt($(this).attr('closeHour'), 10);
			var closeMin = parseInt($(this).attr('closeMinute'), 10);
			var timeTillClose= new Array();	
			
			if((openHour > closeHour) && (currentTime[1] > closeHour))
			{
				closeHour += 24;
			}
			
			timeTillClose = calculateTime(closeHour, closeMin);
				//alert("TimeTillClose: " + timeTillClose);
			
			if((((timeTillClose[0] * 1440) + (timeTillClose[1] * 60) + (timeTillClose[2]) - 1))< 0)
			{
				$(this).parent().parent().parent().parent().remove();
			}
			else
			{
				var timeString = formatTime(timeTillClose);
				$(this).text(timeString);
			}
			closingTime();
		}
	});

}

function calculateTime(closeHour, closeMin)
{
	var currentTime = dateTime();
	
	var timeTillClose= new Array();
	timeTillClose[0] = 0;
	timeTillClose[1] = closeHour - currentTime[1];
	timeTillClose[2] = closeMin - currentTime[2];
	//alert(timeTillClose[1] + ":" + timeTillClose[2]);
	
	if(timeTillClose[1] > 24)
	{
		timeTillClose[1] = timeTillClose[1] -  24;
	}
	/*if(timeTillClose[2] > 0)
	{
		timeTillClose[1] = timeTillClose[1] - 1;
	}*/
	if (timeTillClose[2] < 0)
	{
		timeTillClose[2] = 60 + timeTillClose[2];
		timeTillClose[1] = timeTillClose[1] - 1;
		//alert("New Min: " + timeTillClose);
	}
	return timeTillClose;
}

function formatTime(timeTillClose) {
	var timeString = "Closes in ";
	/*TimeTillClose format:
	timeTillClose[0] - binary if open 24 hours
	timeTillClose[1] - hours till tonight's close
	timeTillClose[2] - minutes till tonight's close*/
	
	if(timeTillClose[0] == 0)
	{
		if(timeTillClose[1] > 0) {
			timeString += timeTillClose[1] + " hours";
		}
		if(timeTillClose[2] > 0) {
			if(timeTillClose[1] >= 1)
			{
				timeString +=  " and ";
			}
			if(timeTillClose[2] == 1)
			{
				timeString += timeTillClose[2] + " minute";
			}
			
			else
			{
				timeString += timeTillClose[2] + " minutes";
			}
		}
	}
	else
	{
		timeString = "Open 24 hours";
	}
	return timeString;
	
}

function dateTime() {
	/*timeData format:
	timeData[0] - day of the week
	timeData[1] - current hour
	timeData[2] - current minute*/
	
	var currentdate = new Date();
	var timeData= new Array();
	timeData[0] = currentdate.getDay();
	timeData[1] = currentdate.getHours();
	timeData[2] = currentdate.getMinutes();
	//alert(timeData[1] + ":" + timeData[2]);
	return timeData;
}

function hideDetails() {
	$( "div" ).each(function (i) {
		if($(this).is('.details')) {	
			$(this).hide();
		}
	});
}

function mobileDetails(){
	$(".summary").click(function() {
				//alert($(this).find(".details").css('display'));
				$(".details").each(function() {
					$(this).slideUp();
				});
				
				if($(this).parent().find(".details").css('display') == "none")
				{
					
					$(this).parent().find(".details").slideDown();
				}
				else
				{
					$(this).parent().find(".details").slideUp();
				}
				updateTime();
			})
}

function toRad(Value) {
    /** Converts numeric degrees to radians */
    return Value * Math.PI / 180;
}

function locationDistance(latUser, lonUser, latFood, lonFood){
	//Uses haversine formula found on http://www.movable-type.co.uk/
	var R = 6371; // km
	var dLat = toRad(latUser-latFood);
	var dLon = toRad(lonUser-lonFood);
	var latFood = toRad(latFood);
	var latUser = toRad(latUser);

	var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
			Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(latFood) * Math.cos(latUser); 
	var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
	var d = R * c;
	var miles = d * 0.651371;
	return miles;
}

function getLocation() {
	
	if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(gotLocation);
	}
	else
	{
		x.innerHTML="Geolocation is not supported by this browser.";
	}
}

function gotLocation(position) {
	var myLocation = position.coords;
	alert(myLocation.latitude + " " +  myLocation.longitude);
	displayDistance(myLocation.latitude, myLocation.longitude);
}

function displayDistance(myLatitude, myLongitude)
{
	var distance;
	var string;

	$( ".distance" ).each(function() {
		if($(this).is('.distance')) {
			var longitude  = parseFloat($(this).attr('long'));
        	        var latitude = parseFloat($(this).attr('lat'));
	                distance = locationDistance(myLatitude, myLongitude, latitude, longitude);
			var roundedDistance = (Math.round(distance * 10) / 10);
			if(roundedDistance == 1)
			{
				string = "~" + (Math.round(distance * 10) / 10) + " mile away";
			}
			else
			{
				string = "~" + (Math.round(distance * 10) / 10) + " miles away";
			}
        	        $(this).text(string);
	
		}
	});
}

//Used to parse data from php.ini for DB connection		
/*function loadConfig( $vars = array() ) {
    foreach( $vars as $v ) {
        define( $v, get_cfg_var( "myapp.cfg.$v" ) );
    }
}*/
