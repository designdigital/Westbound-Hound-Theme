function initialize() {
  var myLatlng = new google.maps.LatLng(37.09024,-95.712891);
  var mapOptions = {
    zoom: 5,
    center: myLatlng
  }

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var kmlLayer = new google.maps.KmlLayer({
    url: 'https://feeds.foursquare.com/history/A1YTYJCWSJTB5K3IBVQBEXLK5GXTQ1EQ.kml',
    suppressInfoWindows: true,
    map: map
  });

  google.maps.event.addListener(kmlLayer, 'click', function(kmlEvent) {
    var text = kmlEvent.featureData.infoWindowHtml;
    console.log(kmlEvent);
    showInContentWindow(text);
  });

  function showInContentWindow(text) {
    var sidediv = document.getElementById('content-window');
    sidediv.innerHTML = text;
  }

}

google.maps.event.addDomListener(window, 'load', initialize);