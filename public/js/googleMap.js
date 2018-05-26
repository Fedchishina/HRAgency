function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(48.001136, 37.832283),
        zoom: 17,
    };

    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}