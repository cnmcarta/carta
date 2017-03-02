
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
		$('document').ready(function(){
			$('#captureBox h1,p').delay(1000).animate({left: 0}, 1000);
		});
</script>


    <script>
	var map;
	var src = 'http://carta.korwest.com/wp-content/plugins/cartamap/assets/cartamap.kml?cachebust='+(new Date()).getTime();
	var newmapstyle =[
    {
        "featureType": "all",
        "elementType": "all",
        "stylers": [
            {
                "saturation": "-29"
            },
            {
                "lightness": "0"
            },
            {
                "hue": "#ff8d00"
            }
        ]
    },
    {
        "featureType": "administrative.country",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative.province",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative.locality",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "administrative.neighborhood",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative.land_parcel",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "lightness": "0"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "saturation": "-50"
            }
        ]
    },
    {
        "featureType": "landscape.natural",
        "elementType": "geometry",
        "stylers": [
            {
                "saturation": "5"
            }
        ]
    },
    {
        "featureType": "landscape.natural.landcover",
        "elementType": "geometry",
        "stylers": [
            {
                "saturation": "-2"
            }
        ]
    },
    {
        "featureType": "landscape.natural.terrain",
        "elementType": "geometry",
        "stylers": [
            {
                "saturation": "-17"
            }
        ]
    },
    {
        "featureType": "landscape.natural.terrain",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {
                "saturation": "-64"
            },
            {
                "lightness": "-8"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "lightness": "-40"
            },
            {
                "saturation": "-61"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#8e3911"
            },
            {
            	"saturation": "50"
            },
            
            {
                "weight": "1.5"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#c1bdb5"
            }
        ]
    }
]
	var mapstyle = [
				{
					"featureType": "water",
					"elementType": "geometry",
					"stylers": [{"hue": "#066763"},{"saturation": 34},{"lightness": -69},{"visibility": "on"}]
				},
				{
					"featureType": "landscape",
					"elementType": "geometry",
					"stylers": [{"hue": "#cfdde6"},{"saturation": -1},{"lightness": 0},{"visibility": "on"}]
				},
				{
					"featureType": "landscape.man_made",
					"elementType": "all",
					"stylers": [{"hue": "#cbdac1"},{"saturation": -6},{"lightness": -9},{"visibility": "on"}]
				},
				{
					"featureType": "road",
					"elementType": "geometry",
					"stylers": [{"hue": "#8d9b83"},{"saturation": -89},{"lightness": -12},{"visibility": "on"}]
				},
				{
					"featureType": "road.highway",
					"elementType": "geometry",
					"stylers": [{"hue": "#d4dad0"},{"saturation": -88},{"lightness": 54},{"visibility": "simplified"}]
				},
				{
					"featureType": "road.arterial",
					"elementType": "geometry",
					"stylers": [{"hue": "#bdc5b6"},{"saturation": -89},{"lightness": -3},{"visibility": "simplified"}]
				},
				{
					"featureType": "road.local",
					"elementType": "geometry",
					"stylers": [{"hue": "#000000"},{"saturation": -89},{"lightness": -26},{"visibility": "on"}]
				},
				{
					"featureType": "poi",
					"elementType": "geometry",
					"stylers": [{"hue": "#782805"},{"saturation": 61},{"lightness": -45},{"visibility": "on"}]
				},
				{
					"featureType": "poi.park",
					"elementType": "all",
					"stylers": [{"hue": "#8aa8b7"},{"saturation": -46},{"lightness": -28},{"visibility": "on"}]
				},
				{
					"featureType": "transit",
					"elementType": "geometry",
					"stylers": [{"hue": "#a43218"},{"saturation": 74},{"lightness": -51},{"visibility": "simplified"}]
				},
				{
					"featureType": "administrative.province",
					"elementType": "all",
					"stylers": [{"hue": "#ffffff"},{"saturation": 0},{"lightness": 100},{"visibility": "simplified"}]
				},
				{
					"featureType": "administrative.neighborhood",
					"elementType": "all",
					"stylers": [{"hue": "#ffffff"},{"saturation": 0},{"lightness": 100},{"visibility": "off"}]
				},
				{
					"featureType": "administrative.locality",
					"elementType": "labels",
					"stylers": [{"hue": "#ffffff"},{"saturation": 0},{"lightness": 100},{"visibility": "off"}]
				},
				{
					"featureType": "administrative.land_parcel",
					"elementType": "all",
					"stylers": [{"hue": "#ffffff"},{"saturation": 0},{"lightness": 100},{"visibility": "off"}]
				},
				{
					"featureType": "administrative",
					"elementType": "all",
					"stylers": [{"hue": "#3a3935"},{"saturation": 5},{"lightness": -57},{"visibility": "off"}]
				},
				{
					"featureType": "poi.medical",
					"elementType": "geometry",
					"stylers": [{"hue": "#cba923"},{"saturation": 50},{"lightness": -46},{"visibility": "on"}]
				},
				{
					"featureType": "administrative",
					"elementType": "labels.text.fill",
					"stylers": [{"color": "#444444"}]
				},
				]
      /**
       * Initializes the map and calls the function that creates polylines.
       */
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-106.262683,31.564923),
          zoom: 2,
          mapTypeId: 'terrain',
			styles: newmapstyle
        });
        loadKmlLayer(src, map);
      }

      /**
       * Adds a KMLLayer based on the URL passed. Clicking on a marker
       * results in the balloon content being loaded into the right-hand div.
       * @param {string} src A URL for a KML file.
       */
      function loadKmlLayer(src, map) {
        var kmlLayer = new google.maps.KmlLayer(src, {
          suppressInfoWindows: true,
          preserveViewport: false,
          map: map
        });
        google.maps.event.addListener(kmlLayer, 'click', function(event) {
          var content = event.featureData.infoWindowHtml;
          var testimonial = document.getElementById('captureBox');
          //testimonial.innerHTML = content;
		  
		  $('#captureBox').animate({opacity: 0, padding : 20}, 500);


          setTimeout(function(){
			testimonial.innerHTML = content;
		  }, 510);
		  
		  $('#captureBox').delay(700).animate({opacity: 1, padding: 0}, 500);
		  
		  
        });
       }
      </script>
    

    <div class="bodyinside">
     <!--   <h1>El Camino Real de Tierra Adentro</h1><br> -->
        <h1 class = "interactivemap">The Royal Road of the Interior Lands</h1>
    <div id="map"></div>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClIID75_mjy20fupwSmSdhWVWJqOJ7itg&callback=initMap">
    </script>
    <div id="thePics">
        <img id="img1" src="/wp-content/uploads/2015/11/DSCN3862.jpg" alt="El Paso County Pic"
             width="100%" height="175" class="space">
        <img id="img2" src="/wp-content/uploads/2014/08/Photos-up-to-July-29-2012-889-2.jpg" alt="El Paso County Pic"
             width="100%" height="175" class="space">
        <img id="img3" src="/wp-content/uploads/2015/11/2015-06-13-13.43.28-2.jpg" alt="El Paso County Pic"
             width="100%" height="175">
    </div>
        
        <div id="capture">
		<div id="captureBox">
			<h1>
				How To Use This Map
			</h1>
			<p>
				Click a pin icon on the map to the left.  The information will display here.
			</p>
		</div>
	</div>

        
    </div>
