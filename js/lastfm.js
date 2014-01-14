$(document).ready(function(){
  var user = "heathersfield";
  var api_key = "83b247569a096a61eef0c64bcee967ae";
  $.getJSON("http://ws.audioscrobbler.com/2.0/?method=user.getRecentTracks&user=" + user + "&api_key=" + api_key + "&format=json&callback=?", function(data) {
      var music = $('<ul></ul>');
      $.each(data.recenttracks.track, function(i, item){
        if(i <= 15){
          music.append('<li><a href="' + item.url + '"><img src="' + item.image[3]['#text'] + '"/></a></li>');
        }
      });
      $('.listening-to').append(music);
    });
  });