// JavaScript Document

//var echojs = require('echojs');

var echo = echojs({
  key: BAASLT745WMR6Z5JK
});

// http://developer.echonest.com/docs/v4/song.html#search
echo('song/search').get({
  artist: 'radiohead',
  title: 'karma police'
}, function (err, json) {
  console.log(json.response);
});