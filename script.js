const contents = ["#content1","#content2","#content3"];
const dots = ["#first-dot","#second-dot","#third-dot"];
var current = 0;
var interval;
var res_menu = $('#res_menu');


const left_arrow = $("#left_arrow");
const right_arrow = $("#right_arrow");

const categ1 = $('.categ1');
const categ2 =  $('.categ2');
const categ3 =  $('.categ3');


// const products = [
//     {
//         title: 'منارة شتورة بابا غنوج 180 غ',
//         link: 'http://www.bekai-group.com/ar/products/1/%D9%85%D9%86%D8%A7%D8%B1%D8%A9-%D8%B4%D8%AA%D9%88%D8%B1%D8%A9-%D8%A8%D8%A7%D8%A8%D8%A7-%D8%BA%D9%86%D9%88%D8%AC-180-%D8%BA',
//         image : 'http://www.bekai-group.com/upload/cache/h_200_product_img_1.jpg',
//         quantity : '180 غ صندوق * 24',
//         details : 'أحد أشهى أطباق المازة...' 
//     },
//     {
//         title: 'منارة شتورة بابا غنوج 360 غ',
//         link: 'http://www.bekai-group.com/ar/products/2/%D9%85%D9%86%D8%A7%D8%B1%D8%A9-%D8%B4%D8%AA%D9%88%D8%B1%D8%A9-%D8%A8%D8%A7%D8%A8%D8%A7-%D8%BA%D9%86%D9%88%D8%AC-360-%D8%BA',
//         image : 'http://www.bekai-group.com/upload/cache/h_200_product_img_2.jpg',
//         quantity : '360 غ صندوق *24',
//         details : 'أحد أشهى أطباق المازة...' 
//     },
//     {
//         title: 'منارة شتورة بديل الحامض 1 ليتر',
//         link: 'http://www.bekai-group.com/ar/products/3/%D9%85%D9%86%D8%A7%D8%B1%D8%A9-%D8%B4%D8%AA%D9%88%D8%B1%D8%A9-%D8%A8%D8%AF%D9%8A%D9%84-%D8%A7%D9%84%D8%AD%D8%A7%D9%85%D8%B6-1-%D9%84%D9%8A%D8%AA%D8%B1',
//         image : 'http://www.bekai-group.com/upload/cache/h_200_product_img_3.jpg',
//         quantity : '1 ليتر صندوق * 12',
//         details : 'الطهي لأسرة مشغولة غالبا...' 
//     },
//     {
//         title: 'منارة شتورة شراب 600 مل جلاب',
//         link: 'http://www.bekai-group.com/ar/products/5/%D9%85%D9%86%D8%A7%D8%B1%D8%A9-%D8%B4%D8%AA%D9%88%D8%B1%D8%A9-%D8%B4%D8%B1%D8%A7%D8%A8-600-%D9%85%D9%84-%D8%AC%D9%84%D8%A7%D8%A8',
//         image : 'http://www.bekai-group.com/upload/cache/h_200_product_img_5.jpg',
//         quantity : '600 مل صندوق * 12',
//         details : 'زجاجة الجلاب لدىشركة سينيق...' 
//     },
//     {
//         title: 'منارة شتورة شراب 3.5 ليتر قمر الدين',
//         link: 'http://www.bekai-group.com/ar/products/7/%D9%85%D9%86%D8%A7%D8%B1%D8%A9-%D8%B4%D8%AA%D9%88%D8%B1%D8%A9-%D8%B4%D8%B1%D8%A7%D8%A8-3.5-%D9%84%D9%8A%D8%AA%D8%B1-%D9%82%D9%85%D8%B1-%D8%A7%D9%84%D8%AF%D9%8A%D9%86',
//         image : 'http://www.bekai-group.com/upload/cache/h_200_product_img_7.jpg',
//         quantity : '3.5 صندوق * 4',
//         details : 'مكثف شراب قمر الدين عنصر...' 
//     },
//     {
//         title: 'منارة شتورة شراب 3.5 ليتر جلاب',
//         link: 'http://www.bekai-group.com/ar/products/8/%D9%85%D9%86%D8%A7%D8%B1%D8%A9-%D8%B4%D8%AA%D9%88%D8%B1%D8%A9-%D8%B4%D8%B1%D8%A7%D8%A8-3.5-%D9%84%D9%8A%D8%AA%D8%B1-%D8%AC%D9%84%D8%A7%D8%A8',
//         image : 'http://www.bekai-group.com/upload/cache/h_200_product_img_8.jpg',
//         quantity : '3.5 صندوق * 4',
//         details : 'زجاجة الجلاب لدىشركة سينيق...' 
//     },
//     {
//         title: 'منارة شتورة زيت 4.5 ليتر',
//         link: 'http://www.bekai-group.com/ar/products/74/%D9%85%D9%86%D8%A7%D8%B1%D8%A9-%D8%B4%D8%AA%D9%88%D8%B1%D8%A9-%D8%B2%D9%8A%D8%AA-4.5-%D9%84%D9%8A%D8%AA%D8%B1',
//         image : 'http://www.bekai-group.com/upload/cache/h_200_product_img_74.jpg',
//         quantity : '4.5 ليتر صندوق * 4',
//         details : 'على الرغم من أن دوار الشمس...' 
//     }
// ]


////////////////////////// Functions /////////////////////////////

//banner functions
function leftArrow(){
    // left arrow banner click handling
    previous = current;

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
    previous = current;

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

    $(contents[previous]).hide();
    $(contents[current]).css("display","flex");
    $(contents[current]).addClass("show-content")
    $(dots[current]).addClass("active-dot")
    $(dots[previous]).removeClass("active-dot")

    clearInterval(interval);
    intervalNav();
}
function navDot(dot){
    console.log("dot "+dot)
    if(dot !== current){
        changeBanner(dot,current)
        current = dot;
    }


}

function intervalNav(){
    // auto change banner every 5 seconds
    interval = setInterval( function(){
        rightArrow()
    },5000)
}

//categories functions

function handlecateg1(event_type){
    // console.log("categ1");
    if(event_type === 'mouseover'){
        // console.log("mouse is over")
        
        categ2.css("right", "50%")
        categ3.css("right", "75%")
    }
    else if(event_type === 'mouseout'){
        // console.log("mouse is out")
        categ2.css("right", "calc(100%/3)")
        categ3.css("right", "calc(200%/3)")
    }
}

function handlecateg2(event_type){
    // console.log("categ2")
    if(event_type === 'mouseover'){
        // console.log("mouse is over")
        categ2.css("right", "25%")
        categ3.css("right", "75%")

    }
    else if(event_type === 'mouseout'){
        // console.log("mouse is out")
        categ2.css("right", "calc(100%/3)")
        categ3.css("right", "calc(200%/3)")
    }
}

function handlecateg3(event_type){
    console.log("categ3")
    if(event_type === 'mouseover'){
        // console.log("mouse is over")
        categ2.css("right", "25%")
        categ3.css("right", "50%")
    }
    else if(event_type === 'mouseout'){
        // console.log("mouse is out")
        categ2.css("right", "calc(100%/3)")
        categ3.css("right", "calc(200%/3)")
    }
}
////////

// products functions

// function insertProducts(){
//     for( var i =0; i<products.length;i++){

//         // creating each product's elements
//         var product = document.createElement('li');
//         var anchor = document.createElement('a');
//         var image_div = document.createElement('div');
//         var image = document.createElement('img');
//         var title = document.createElement('div');
//         var quantity = document.createElement('div');
//         var details = document.createElement('div');
    
//         //adding proper classes and inner text
//         product.addClass('product')
//         anchor.href = products[i].link;
//         image_div.addClass('product-img');
//         image.src = products[i].image;
//         title.addClass('product-title')
//         title.innerText = products[i].title;
//         quantity.addClass('product-quantity')
//         quantity.innerText = products[i].quantity;
//         details.addClass('product-details');
//         details.innerText = products[i].details;
    
//         //appending elements to each other
//         image_div.appendChild(image);
//         anchor.appendChild(image_div);
//         anchor.appendChild(title);
//         anchor.appendChild(quantity);
//         anchor.appendChild(details);
//         product.appendChild(anchor);        //appending product to product list
//         $('#products').appendChild(product) 
//     }
// }

function rightProduct(){
    $('#products').css("transition","left 0.4s ease-out");
    $('#products').css("left","-222px");
    setTimeout(function (){
        $('#products').append($('#products li:first-child'));
        $('#products').css("transition","");
        $('#products').css("left","0px");

    }, 500);
}

function leftProduct(){
    $('#products').css("transition","");
    $('#products li:last-child').insertBefore($('#products li:first-child'));
    $('#products').css("left","-222px");
    setTimeout(function (){
        $('#products').css("transition","left 0.4s ease-out");
        $('#products').css("left","0");

    }, 1);

}



/// banners from db and display ///////////

function getBanners(){

    var request = $.ajax({
        url: "http://localhost/test/php/get_banners.php",
        method: "GET"
    });
        request.done(function(res){
        var banners = JSON.parse(res);
        loadBanners(banners);
        });
}

getBanners();

function loadBanners(banners){

    for(var i =1 ; i<4 ; i++){
        $('#content' + (i)).append(
            "<h1 class=\"slide-banner-title\">" + banners[i-1]['title'] + "</h2>" +
            "<p class=\"slide-banner-text\">" + banners[i-1]['details'] + "</p>"
        )
    }

}

////////////////


/// categ names from db and display //////////

function getCateg(){
    var request = $.ajax({
        url:"http://localhost/test/php/get_categ_names.php",
        method: "GET"
    });
        request.done(function(res){
            var names = JSON.parse(res);
            loadNames(names);
        });
}

function loadNames(names){
    for(var i =1; i<4;i++){
        $('#name' + i).text(names[i-1]['name'])
    }
}

getCateg();
//// End Of Functions ///////////////////////////////////////////////////////////////



// nav banner
intervalNav(); // auto nav banner
left_arrow.on('click',leftArrow);
right_arrow.on('click',rightArrow);
$(dots[0]).on('click',() =>{navDot(0)});
$(dots[2]).on('click',() =>{navDot(2)});
$(dots[1]).on('click',() =>{navDot(1)});
//




if(window.innerWidth > 600){
    categ1.mouseover(function(){
        handlecateg1("mouseover");
    }) 
    categ1.mouseout(function(){
        handlecateg1("mouseout");

    })
    categ2.mouseover(function(){
        handlecateg2("mouseover");
    }) 
    categ2.mouseout(function(){
        handlecateg2("mouseout");

    })
    categ3.mouseover(function(){
        handlecateg3("mouseover");
    }) 
    categ3.mouseout(function(){
        handlecateg3("mouseout");

    })

}

//

// products
// insertProducts();

$('.right-arrow-green').on('click',rightProduct);
$('.left-arrow-green').on('click',leftProduct);

//

// resposnive menu
$("#burger").on('click',()=>{
    if(res_menu.css("right") === '0px'){
        res_menu.css("right",'-100%');
        setTimeout(()=>{
            res_menu.css("display" , 'none');
        },100)
    }
    else{
        res_menu.css("display", 'block');
        setTimeout(()=>{
            res_menu.css("right" , '0px');

        },0)
    }

})




$('.slide-banner')

////////////////////////////////////////////////////////////////
//////////////////////////// map //////////////////////////////
//////////////////////////////////////////////////////////////

var script = document.createElement('script');
  script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBtwgyqv12iElBQTpy0h0xZU3mvMnhGXBI&callback=initMap";
  script.async = true;

  // Attach your callback function to the `window` object
  window.initMap = function() {
    map = new google.maps.Map(document.getElementById('map'), {
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
document.head.append(script);

/////////////////////////////////////////