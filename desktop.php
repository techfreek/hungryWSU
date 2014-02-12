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
		$(document).ready(function() {
                        //closingTime();
                        updateTime();
                        updateText();
                        $( "#deliveryButton" ).click(function() {filter();});
                        setInterval(function(){updateTime()},60000); //This will be the update interval

                });
		updateImage();
	</script>
	
	<div id="tagLine">Let's face it, you're hungry. What's still open?</div>
			<div id="deliveryButton">Want it delivered?</div>

			<div id="facebookButton"><div class="fb-like" data-href="https://www.facebook.com/drunkWSU" data-layout="button_count" data-action="like" data-share="true" data-colorscheme="light" ></div></div>
			
			<div id="results">

			<?php  
				ini_set('display_errors', 'On');
				error_reporting(E_ALL | E_STRICT);
				//print "Here!\n";
				include("time.php");

				$db_conn = parse_ini_file("../config.ini");
				date_default_timezone_set('America/Los_Angeles');
				$date = date('m/d/Y h:i:s a', time());				
				//print_r($db_conn["DBHOST"]);
					
				//print("here");			

	
				$day = date("w");
				$hour= date("H");
				$min = date("i");
			
				//print $db_conn[DBHOST];
				

				try 
				{
					$db = new PDO("mysql:host=$db_conn[DBHOST];dbname=$db_conn[DBNAME]", $db_conn["DBUSER"], $db_conn["DBPASS"]);
				}
				catch(PDOException $e)
				{
					echo $e->getMessage();
					echo "ERROR!";
				}
				
				$query = "SELECT * 
								FROM location
								INNER JOIN times
								ON location.id = times.location
								WHERE day =$day
								ORDER BY sponsored DESC, uuid()";
					
				//print("here1");
				
					
				$results = $db->query($query);
				
				//var_dump($results);
				//print("here!\n");
				

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
					foreach ($results as $restaurant)
					{
						//print("here2");	
						
						if(! (isOpen($hour, $min, $restaurant['openHour'], $restaurant['openMin'], $restaurant['closeHour'], $restaurant['closeMin'], $restaurant['alwaysOpen'])))
						{
							continue;
						}
						
						
						echo '<div class="result">';
						echo '<div class="summary">';
						echo '<div class="pure-g">';
						if($restaurant['sponsored'] == 1)
						{
							if($restaurant['website'] != null)
							{
								echo '<div class="pure-u-1-3"><div id="name"><img class="promoStar" alt="Sponsored Result" src="whitePromo.png"><a href="' . $restaurant['website'] . '">' . $restaurant['name'] . '</a></div></div>';
							}
							else
							{
								echo '<div class="pure-u-1-3"><div id="name"><img class="promoStar" alt="Sponsored Result" src="whitePromo.png">' . $restaurant['name'] . '</div></div>';
							}
							
						}
						else
						{
							if($restaurant['website'] != null)
							{
								echo '<div class="pure-u-1-3"><div id="name"><a href="' . $restaurant['website'] . '">' . $restaurant['name'] . '</a></div></div>';
							}
							else
							{
									echo '<div class="pure-u-1-3"><div id="name">
									' . $restaurant['name'] . '</div></div>';
							}
						}
						if( $restaurant['delivers'] == 1)
						{
							echo '<div class="pure-u-1-3"><div class="yes">We\'ll deliver!</div></div>';
						}
						else
						{
							echo '<div class="pure-u-1-3"><div class="no">We don\'t deliver :(</div></div>';
						}
						echo '<div class="pure-u-1-3"><div id="type">' . $restaurant['category'] . '</div></div>';
						echo '</div>';
						echo '</div>';
						echo '<div class="details">';
						echo '<div class="pure-g">';
						echo '<div class="pure-u-1-2"><div id="address" id="detail"><a href="http://maps.google.com/maps?ie=UTF-8&amp;hl=en&amp;q=' . str_replace(' ', '+', $restaurant['address']) . '%0A' . $restaurant['city'] . '%2C+' . $restaurant['state'] . '+' . $restaurant['zip'] .'">' . $restaurant['address'] . ', ' . $restaurant['city'] . ', ' . $restaurant['state'] . ' ' . $restaurant['zip'] . '</a></div></div>';
						echo '<div class="pure-u-1-2"><div id="phoneNum">Phone: ' . $restaurant['phoneNumber'] . '</div></div>';
						echo '<div class="pure-u-1"><div id="openTill" openHour="' . $restaurant['openHour'] . '" openMin="' . $restaurant['openMin'] . '" closeHour="' . $restaurant['closeHour'] . '" closeMinute="' . $restaurant['closeMin'] . '" alwaysOpen="' . $restaurant['alwaysOpen'] . '"></div></div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
				}
				$db = null;
			?>
		</div>
		
	<?php include 'footer.php'; ?>	
			
	</div>