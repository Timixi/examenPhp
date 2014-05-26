/*================	recherche	============*/


/*================	map	====================*/

// When the window has finished loading create our google map below

google.maps.event.addDomListener(window, 'load', initialize);
var map;
var geocoder;
var initialLocation;
var geoResults = {};
var searchResults = [];
var geocodeMarkers = [];

function initialize() {
  geocoder = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng(48.180275, 4.395523);
  var myOptions = {
      zoom: 5,
      //panel control disable
      disableDefaultUI: true,
      // desactiver le zoom à la molette
      scrollwheel: false,
      center: latlng,
      zoomControl: true,
      zoomControlOptions: {
          style: google.maps.ZoomControlStyle.SMALL,
          position: google.maps.ControlPosition.BOTTOM_RIGHT
      },
      styles: [   {stylers:[{hue:'#ff1a00'},{invert_lightness:true},{saturation:-100},{lightness:33},{gamma:0.4}]},
      {featureType:'water', elementType:'all', stylers:[{color:'#383838', visibility:'simplified'}]},
      {featureType:'road', elementType:'all', stylers:[{visibility:'off'}]},
      {featureType:'administrative.locality', elementType:'all', stylers:[{visibility:'off'}]},
      {featureType:'administrative.country', elementType:'all', stylers:[{visibility:'off'}]},
      {featureType:'administrative.province', elementType:'all', stylers:[{visibility:'off'}]},
      {featureType:'landscape.man_made', elementType:'all', stylers:[{visibility:'off'}]},
      {featureType:'landscape.natural.terrain', elementType:'all', stylers:[{visibility:'off'}]},
      {featureType:'poi.park', elementType:'all', stylers:[{visibility:'off'}]}   ]
  }
  map = new google.maps.Map(document.getElementById("map"), myOptions);
  codeAddress();
}    
function displayMarkers() {

  // If geocoded successfully for both addresses
  if(geocodeMarkers.length === 2) {

    // Center map to second geocoded location
    map.setCenter(geocodeMarkers[0].getPosition());

    // Setting markers to map
    geocodeMarkers[0].setMap(map);
    geocodeMarkers[1].setMap(map);    

    flightPath = new google.maps.Polyline({
       path: [geocodeMarkers[0].getPosition(), geocodeMarkers[1].getPosition()],
       strokeColor:"#"+((1<<24)*Math.random()|0).toString(16),
       strokeOpacity:0.4,
       strokeWeight:2,
       map: map
    });

  }

}



function codeAddress() {

  // Emptying last addresses because of recent query
  for(var i = 0; i < geocodeMarkers.length; i++) {
     geocodeMarkers[i].setMap(null);
  }  

  // Empty array
  geocodeMarkers.length = 0;

  // Empty flight route
  if(typeof flightPath !== "undefined") {
     flightPath.setMap(null);
     flightPath = undefined;
  }  

  var address = $('#address').text();

  geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
          // Adding marker to geocodeMarkers
          geocodeMarkers.push(
              new google.maps.Marker({
                position: results[0].geometry.location,
                icon: image
              })
          );
          // Attempting to display
          displayMarkers();
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
      }
  });

  var address2 = $('#address2').text();

  geocoder.geocode( { 'address': address2 }, function(results2, status2) {
      if (status2 == google.maps.GeocoderStatus.OK) {
          // Adding marker to geocodeMarkers
          geocodeMarkers.push(
              new google.maps.Marker({
                  position: results2[0].geometry.location,
                  icon: image
              })
          );
          // Attempting to display
          displayMarkers();
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
      }
  });

  var image = {
    // Adresse de l'icône personnalisée
    url: 'vues/includes/img/pin.png',
    // Taille de l'icône personnalisée
    size: new google.maps.Size(14, 14),
    // Origine de l'image, souvent (0, 0)
    origin: new google.maps.Point(0,0),
    // L'ancre de l'image. Correspond au point de l'image que l'on raccroche à la carte. Par exemple, si votre îcone est un drapeau, cela correspond à son mâts
    anchor: new google.maps.Point(7, 7)
  };

}








/*================  scroll ancres ============*/

$(document).ready(function(){
    // au clic sur un lien
    $('a.scroll').on('click', function(evt){
       // bloquer le comportement par défaut: on ne rechargera pas la page
       evt.preventDefault(); 
       // enregistre la valeur de l'attribut  href dans la variable target
  var target = $(this).attr('href');
       /* le sélecteur $(html, body) permet de corriger un bug sur chrome et safari (webkit) */
  $('html, body')
       // on arrête toutes les animations en cours 
       .stop()
       /* on fait maintenant l'animation vers le haut (scrollTop) vers notre ancre target */
       .animate({scrollTop: $(target).offset().top}, 1000 );

});
    
/*================  modal add voyage   ============*/

$('#modal').click(function(){
  var mydiv = $('#overlay').css('display');

  if (mydiv === 'block' || mydiv === '') 
    $('#overlay').css('display','none');
  else
    $('#overlay').css('display','block');


});

$('#closeModal').click(function(){

 var mydiv = $('#overlay').css('display');

  if (mydiv === 'block' || mydiv === '') 
    $('#overlay').css('display','none');
  else
    $('#overlay').css('display','block');

});


/*================  toggle map background   ============*/

$('#viewMapButton').click(function(){

  var mydiv = $('#content-bckg').css('display');

  if (mydiv === 'block' || mydiv === '') 
    $('#content-bckg').css('display','none');
  else
    $('#content-bckg').css('display','block');
    
});


/*================  switcher travel add form  ============*/


$(".cb-enable").click(function(){
    var parent = $(this).parents('.switch');
    $('.cb-disable',parent).removeClass('selected');
    $(this).addClass('selected');
    $('.checkbox',parent).attr('checked', true);
});
$(".cb-disable").click(function(){
    var parent = $(this).parents('.switch');
    $('.cb-enable',parent).removeClass('selected');
    $(this).addClass('selected');
    $('.checkbox',parent).attr('checked', false);
});
            

/*================  scroll top  ============*/        

$(window).scroll(function() {

  if ($(this).scrollTop() > 300) {
      $('#backToTop').fadeIn('slow');
  } else {
      $('#backToTop').fadeOut('slow');
  }

});
  
$('#backToTop').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 1000);
        return false;
});


// DELETE TRAVEL

$('.deleteTravel').click(function(){
  if(confirm("Etes-vous sûr de supprimer ce voyage ?"))
      return true;
  else
      return false;
})


});