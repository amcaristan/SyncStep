<!doctype html>
<html>
<head>
<link href="assets/css/weather_playlist_page.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.simpleWeather/3.0.2/jquery.simpleWeather.min.js"></script>
<script src="http://connect.soundcloud.com/sdk.js"></script>
<script src="assets/js/soundcloud-player.js"></script>
</head>
<body>

<?php
$bpm = $_POST['bpm'];
$artist = $_POST['artist-name'];
$lowercase_artist = strtolower($artist);
$request_URL = "http://developer.echonest.com/api/v4/artist/search?api_key=BAASLT745WMR6Z5JK&results=1&name=" . 
$lowercase_artist;

//print_r($request_URL);

$response = file_get_contents($request_URL);

//echo("<br><br>" . $response . "<br><br>");

$json = json_decode($response, TRUE);

$artist_id = $json['response']['artists'][0]['id'];

$request_URL = "http://developer.echonest.com/api/v4/song/search?api_key=BAASLT745WMR6Z5JK&artist_id=" . $artist_id . 
"&results=5&max_tempo=" . $bpm . "&bucket=audio_summary&sort=tempo-desc";

$response = file_get_contents($request_URL);

//echo("<br><br>Songs Retrieved for " . $bpm . " BPMs: <br>" . $response . "<br><br>");

$json = json_decode($response, TRUE);

$song_title = $json['response']['songs'][0]['title'];
$song_title1 = $json['response']['songs'][1]['title'];
$song_title2 = $json['response']['songs'][2]['title'];
$song_BPM = $json['response']['songs'][0]['tempo'];
$song1_BPM = $json['response']['songs'][1]['tempo'];
$song2_BPM = $json['response']['songs'][2]['tempo'];

//echo("<br><br>#1 song is: " . $song_title . "<br><br>");

echo("<h2>Current Song: " . $song_title . "</h2><br>");
//echo("<h2>Current Song tempo: " );
//print_r($song_BPM);

echo("<script>play(1, \"\", \"" . $song_title . "\", " . $bpm . ", " . "\"" . $song_title . "\", \"\");</script>
    <div id=\"player\"></div><br>");
	echo("<script>play(1, \"\", \"" . $song_title1 . "\", " . $bpm . ", " . "\"" . $song_title1 . "\", \"\");</script>
    <div id=\"player1\"></div><br>");
	echo("<script>play(1, \"\", \"" . $song_title2 . "\", " . $bpm . ", " . "\"" . $song_title2 . "\", \"\");</script>
    <div id=\"player2\"></div>");
?>

</body>
</html>