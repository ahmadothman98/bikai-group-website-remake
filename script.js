  var script = document.createElement('script');
  script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBtwgyqv12iElBQTpy0h0xZU3mvMnhGXBI&callback=initMap";
  script.async = true;
  
  // Attach your callback function to the `window` object
  window.initMap = function() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 33.560153, lng: 35.375396 },
        zoom: 14,
        zoomControl: false,
        scaleControl: true
          });
    /**Saida*/
    var position1 = new google.maps.Marker({
        map: map,
        position: {lat: 33.55793, lng: 35.37618},
        icon: './assets/img/pin.png'
    });
    /**Sainik*/
    var position2 = new google.maps.Marker({
        map: map,
        position: {lat: 33.5351136, lng: 35.3631861},
        icon: './assets/img/pin.png'
    });
    /**Hesbe*/    
    var position3 = new google.maps.Marker({
        map: map,
        position: {lat: 33.5432943, lng: 35.3719459},
        icon: './assets/img/pin.png'
    });
    /**Vilat*/
    var position4 = new google.maps.Marker({
        map: map,
        position: {lat: 33.5463162, lng: 35.3848054},
        icon: './assets/img/pin.png'
    });
    /**Abra*/
    var position5 = new google.maps.Marker({
        map: map,
        position: {lat: 33.563736, lng: 35.400175},
        icon: './assets/img/pin.png'
    });
    /**Barad*/
    var position6 = new google.maps.Marker({
        map: map,
        position: {lat: 33.56623, lng: 35.37966},
        icon: './assets/img/pin.png'
    });
    /**Qayaa*/
    var position7 = new google.maps.Marker({
        map: map,
        position: {lat: 33.56943, lng: 35.38787},
        icon: './assets/img/pin.png'
    });
    /**Sarafand*/
    var position8 = new google.maps.Marker({
        map: map,
        position: {lat: 33.446180, lng: 35.305135},
        icon: './assets/img/pin.png'
    });
};
window.initMap = initMap;

  // Append the 'script' element to 'head'
document.head.appendChild(script);

var current = "content1";

function leftArrow(){
        current = "content" + toString(parseInt(current[-1])+1);
        //showSecond();
        console.log("current");

}

document.getElementsByClassName("right-arrow").addEventListener('click',rightArrow)
var left_arrow = document.getElementsById("left-arrow");
left_arrow.addEventListener('click',leftArrow)
