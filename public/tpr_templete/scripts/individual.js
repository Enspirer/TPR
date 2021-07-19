function initMap() {
    let options = {
      zoom: 12,
      center: { lat: 6.9271, lng: 79.8612 }
    };


    const map = new google.maps.Map(document.getElementById("map"), options);


    let marker = new google.maps.Marker({
        position: {lat:6.9153666551512245, lng:79.87856778012085},
        map:map
    });
}