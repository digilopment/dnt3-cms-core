// Location Map 
//-------------------------------------------------------------------------------


var countdownDate = "2015/10/10"; // Enter your countdown date


var locationContent =     "<h2>"+locationTitle+"</h2>"
                         +"<p>"+locationAddress+"</p>";

$("#location-map").height("350px").gmap3({
	map: {
		options: {
			maxZoom: 16,
      scrollwheel: false
		}  
	},
	infowindow:{
     address: locationAddress,
     options:{
       content: locationContent
     }
  },
  marker:{
    address: locationAddress,
    options: {
     icon: new google.maps.MarkerImage(
       "/img/map-icon.png",
       new google.maps.Size(34, 34, "px", "px"), 
       new google.maps.Point(0, 0),    //sets the origin point of the icon
       new google.maps.Point(16, 18)   //sets the anchor point for the icon
     
     )
    }
 }
}, "autofit");

/*
$( document ).ready(function() {
    $( "#location-map" ).css( "color", "" )
});
*/
