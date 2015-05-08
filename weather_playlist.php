<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">

<title>Weather Playlist</title>
<link href="assets/css/weather_playlist_page.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.simpleWeather/3.0.2/jquery.simpleWeather.min.js"></script>
<script src="http://connect.soundcloud.com/sdk.js"></script>
<script src="assets/js/weather.js"></script>
<script src="assets/js/soundcloud-player.js"></script>
<script src="assets/js/echo-nest.js"></script>
</head>
<body>

<?php

echo("<script>
$(document).ready(function() {
	if (\"geolocation\" in navigator) {
  		navigator.geolocation.getCurrentPosition(function(position) {
    		//load weather using your lat/lng coordinates
			loadWeather(position.coords.latitude+','+position.coords.longitude,''); 
		});
	}
});
</script>
<script>
function loadWeather(location, woeid) {
  $.simpleWeather({
    location: location,
    woeid: woeid,
    unit: 'f',
    success: function(weather) {
      html = '<h2><i class=\"icon-'+weather.code+'\"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h2>';
      html += '<ul><li>'+weather.city+', '+weather.region+'</li>';
      html += '<li class=\"currently\">'+weather.currently+'</li>';
      html += '<li>'+weather.alt.temp+'&deg;C</li></ul>'; 
	  
	  play(2, \"\", \"\", 0, \"\", weather.currently);  
      
      $(\"#weather\").html(html);
    },
    error: function(error) {
      $(\"#weather\").html('<p>'+error+'</p>');
    }
  });
}
</script>

<div id=\"weather\"></div>
<br><br>
<div id=\"player\"></div><br>
<div id=\"player1\"></div><br>
<div id=\"player2\"></div>");

?>

</body>
</html>
