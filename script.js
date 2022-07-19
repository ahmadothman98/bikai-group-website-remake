const contents = ["content1","content2","content3"];
const dots = ["first-dot","second-dot","third-dot"];
var current = 0;
var interval;

var left_arrow = document.getElementById("left_arrow");
var right_arrow = document.getElementById("right_arrow");

var pepper = document.getElementsByClassName('pepper')[0];
var food =  document.getElementsByClassName('food')[0];
var cleaning =  document.getElementsByClassName('cleaning')[0];



////////////////////////// Functions /////////////////////////////

//banner functions
function leftArrow(){
    // left arrow banner click handling

    if (current !== 0){
        current -=1;
        changeBanner(current,current+1);
        // console.log(current);
    }

    else{
        current = 2;
        changeBanner(current,0)
        // console.log(current);
    }

}
function rightArrow(){
    // right arrow banner click handling

    if (current !== 2){
        current +=1;
        changeBanner(current,current-1);
        // console.log(current);
    }

    else{
        current = 0;
        changeBanner(current,2)
        // console.log(current);
    }
}

function changeBanner(current,previous){
    // handles banner navigation

    document.getElementById(contents[previous]).style.display = "none"
    document.getElementById(contents[current]).style.display = "flex"
    document.getElementById(contents[current]).classList.add("show-content")
    document.getElementById(dots[current]).classList.add("active-dot")
    document.getElementById(dots[previous]).classList.remove("active-dot")

    clearInterval(interval);
    intervalNav();
}

function intervalNav(){
    // auto change banner every 5 seconds
    interval = setInterval( function(){
        rightArrow()
    },5000)
}

//categories functions

function handlePepper(event){
    // console.log("pepper");
    if(event.type === 'mouseover'){
        // console.log("mouse is over")
        
        food.style.right = "50%";
        cleaning.style.right = "75%"
    }
    else if(event.type === 'mouseout'){
        // console.log("mouse is out")
        food.style.right = "calc(100%/3)"
        cleaning.style.right = "calc(200%/3)"
    }
}

function handleFood(event){
    // console.log("food")
    if(event.type === 'mouseover'){
        // console.log("mouse is over")
        food.style.right = "25%";
        cleaning.style.right = "75%"

    }
    else if(event.type === 'mouseout'){
        // console.log("mouse is out")
        food.style.right = "calc(100%/3)"
        cleaning.style.right = "calc(200%/3)"
    }
}

function handleCleaning(event){
    console.log("cleaning")
    if(event.type === 'mouseover'){
        // console.log("mouse is over")
        food.style.right = "25%";
        cleaning.style.right = "50%"
    }
    else if(event.type === 'mouseout'){
        // console.log("mouse is out")
        food.style.right = "calc(100%/3)"
        cleaning.style.right = "calc(200%/3)"
    }
}

//// End Of Functions ///////////////////////////////////////////////////////////////



// nav banner
intervalNav(); // auto nav banner
left_arrow.addEventListener('click',leftArrow);
right_arrow.addEventListener('click',rightArrow);
//


//categories
pepper.onmouseover = pepper.onmouseout = handlePepper;
food.onmouseover = food.onmouseout = handleFood;
cleaning.onmouseover = cleaning.onmouseout = handleCleaning;
//


////////////////////////////////////////////////////////////////
//////////////////////////// map //////////////////////////////
//////////////////////////////////////////////////////////////

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

/////////////////////////////////////////