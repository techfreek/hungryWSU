<?php
if(count($results) == 0)
{
	echo '<div class="result">';
	echo '<div class="summary">';
	echo '<div class="pure-g">';
	echo '<div class="pure-u-1">';					
	echo 'div id="noResults">I guess nothing is open in Pullman..."</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
else
{
	  $lateNight = lessThanTime($hour, $min, 5, 0);
          $yesterDate = (($day + 6) % 7);
          foreach ($results as $restaurant)
          {
          	if($lateNight)
                { //Chose 5am as a random number for when places probably aren't opening, but may close before then
                	$id = $restaurant['id'];
                        $yesterday = $db->query("SELECT closeHour, closeMin
                                                 FROM times
                                                 WHERE times.location = $id AND
                                                 times.day = $yesterDate
                                                 LIMIT 1;"); //selects the closing time data from the previous day at that location
                                                                                                                //(($day + 6) % 7) allows us to select the previous day even if it is sunday (0)
                        $yesterTime = $yesterday->fetch();
                        if(!(is_null($yesterTime)) and lessThanTime($yesterTime['closeHour'], $yesterTime['closeMin'], 5, 0))
                        { //We use that new time if it actually exists, and its before 5am (so we won't use it if they close at 11pm)
                                         $restaurant['closeHour'] = $yesterTime['closeHour'];
                                         $restaurant['closeMin'] = $yesterTime['closeMin'];
                        }
                }

                if(! (isOpen($hour, $min, $restaurant['openHour'], $restaurant['openMin'], $restaurant['closeHour'], $restaurant['closeMin'], $restaurant['alwaysOpen'])))
                { //if it's not open, we just skip this result
                        continue;
                }

		echo '<div class="result">';
		echo '<div class="summary">';
		echo '<div class="pure-g">';
		if($restaurant['sponsored'] == 1)
		{
			echo '<div class="pure-u-1-3"><div id="name"><img class="promoStar" alt="Sponsored Result" src="../whitePromo.png">' . $restaurant['name'] . '</div></div>';
		}
		else
		{
			echo '<div class="pure-u-1-3"><div id="name">' . $restaurant['name'] . '</div></div>';
		}
		echo '<div class="pure-u-1-3"><div class="distance" long="' . $restaurant['longitude'] . '" lat="' . $restaurant['latitude'] . '"></div></div>';
		echo '<div class="pure-u-1-3"><div id="type">' . $restaurant['category'] . '</div></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="details">';
		echo '<div class="pure-g">';
		echo '<div class="pure-u-1-2"><div id="address" id="detail"><a href="http://maps.google.com/maps?ie=UTF-8&amp;hl=en&amp;q=' . str_replace(' ', '+', $restaurant['address']) . '%0A' . $restaurant['city'] . '%2C+' . $restaurant['state'] . '+' . $restaurant['zip'] .' target=”_blank”">' . $restaurant['address'] . ', ' . $restaurant['city'] . ', ' . $restaurant['state'] . ' ' . $restaurant['zip'] . '</a></div></div>';
		echo '<div class="pure-u-1-2"><div id="phoneNum">Phone: ' . $restaurant['phoneNumber'] . '</div></div>';
		if( $restaurant['delivers'] == 1)
		{
			echo '<div class="pure-u-1"><div class="yes">We\'ll deliver!</div></div>';
		}
		else
		{
			echo '<div class="pure-u-1"><div class="no">We don\'t deliver :(</div></div>';
		}
		if($restaurant['website'] != null)
		{
			if(substr($restaurant['name'], -2) == "'s")
			{
				echo '<div class="pure-u-1"><div id="website"><a href="' . $restaurant['website'] . '">' . $restaurant['name'] .' Website</a></div></div>';
			}
			else if(substr($restaurant['name'], -1) == "s")
			{
				echo '<div class="pure-u-1"><div id="website"><a target=”_blank” href="' . $restaurant['website'] . '">' . $restaurant['name'] .'\' Website</a></div></div>';
			}
			else
			{
				echo '<div class="pure-u-1"><div id="website"><a target=”_blank” href="' . $restaurant['website'] . '">' . $restaurant['name'] .'\'s Website</a></div></div>';
			}
		}
		echo '<div class="pure-u-1"><div id="openTill" openHour="' . $restaurant['openHour'] . '" openMin="' . $restaurant['openMin'] . '" closeHour="' . $restaurant['closeHour'] . '" closeMinute="' . $restaurant['closeMin'] . '" alwaysOpen="' . $restaurant['alwaysOpen'] . '"></div></div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
} 					
$db = null;
?>
<script>
	getLocation();
</script>
