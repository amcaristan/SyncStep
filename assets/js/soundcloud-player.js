SC.initialize({
  client_id: '18a0d0ac485223c50138025268ec75e9'
});


function play(reqType, genre, artist, bpm, songTitle, weatherCond) {
    switch(reqType) {
		case 0:/*Song by Activity level*/
			generateActivityPlaylist(genre, bpm);
			break;
		case 1:/*Song by bpm*/
			generateBPMPlaylist(artist, bpm);
			break;
		case 2:/*Song by mood*/
			//var mood = generateMood(weatherCond);
			generateMoodPlaylist(weatherCond);
			break;
		case 3:/*Song by search criteria*/
			generateSong(songTitle);
			break;
		default:
			break;	
	}
}

// function genre, bpm
function generateMood(weatherCond){
	switch(weatherCond) {
		case 0:
			return 0;
		case 1:
			return 0;
		case 2:
			return 0;
		default:
			return 0;
	}
}

// function genre, bpm
function generateActivityPlaylist(genre, bpm){
		SC.get('/tracks', { genres: genre, bpm: { from: bpm } }, function(track) {
 			var x = track[0].permalink_url;
 			SC.oEmbed(x, document.getElementById('player'));		
	});
}
//  will only search the last box and the first box

// function for artist, bpm
function generateBPMPlaylist(artist, bpm){
		SC.get('/tracks', { q: artist }, function(songs) {
 			var x = songs[0].permalink_url;
 			var y = songs[1].permalink_url;
			var z = songs[2].permalink_url;
 			SC.oEmbed(x, document.getElementById('player'));
			SC.oEmbed(y, document.getElementById('player1'));
			SC.oEmbed(z, document.getElementById('player2'));	
	});
}
// will only search using the second box  and first box


// weather
// you can just search songs for a description so you can search by rainy and a song will come up or sunny
function generateMoodPlaylist(mood){
		SC.get('/tracks', { q: mood }, function(songs) {
 			var x = songs[0].permalink_url;
 			var y = songs[1].permalink_url;
			var z = songs[2].permalink_url;
 			SC.oEmbed(x, document.getElementById('player'));
			SC.oEmbed(y, document.getElementById('player1'));
			SC.oEmbed(z, document.getElementById('player2'));		
	});
}

// this box will search the genre but the way this one works it lets you search up a song
// with any text so you can search up rainy or cloudy and a song will come up, may be useful.

function generateSong(songTitle){
	SC.get('/tracks', { q: songTitle }, function(songs) {
 		var x = songs[0].permalink_url;
		var y = songs[1].permalink_url;
		var z = songs[2].permalink_url;
 		SC.oEmbed(x, document.getElementById('player'));
		SC.oEmbed(y, document.getElementById('player1'));
		SC.oEmbed(z, document.getElementById('player2'));		
	});
}