SC.initialize({
  client_id: '18a0d0ac485223c50138025268ec75e9'
});

$(document).ready(function() {
    SC.stream('/tracks/293', function(sound) {
        $('#start').click(function(e) {
            e.preventDefault();
            sound.start();
        });
        $('#stop').click(function(e) {
            e.preventDefault();
            sound.stop();
         });
    });
});