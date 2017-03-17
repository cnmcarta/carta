
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
"featureType": "all",
"elementType": "all",
"stylers": [{"saturation": "-29"},{"lightness": "0"},{"hue": "#ff8d00"}]
},
{
"featureType": "water",
"elementType": "all",
"stylers": [{"color": "#c1bdb5"}]
},
{
"featureType": "landscape",
"elementType": "geometry",
"stylers": [{"saturation": -50}]
},
{
"featureType": "landscape.natural",
"elementType": "geometry",
"stylers": [{"saturation": "5"}]
},
{
"featureType": "landscape.natural.landcover",
"elementType": "geometry",
"stylers": [{"saturation": "-2"}]
},
{
"featureType": "landscape.natural.terrain",
"elementType": "geometry",
"stylers": [{"saturation": "-17"}]
},
{
"featureType": "landscape.natural.terrain",
"elementType": "labels",
"stylers": [{"visibility": "off"}]
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
"featureType": "poi.park",
"elementType": "geometry",
"stylers": [{"saturation": "-64"},{"lightness": "-8"}]
},
{
"featureType": "poi.park",
"elementType": "labels",
"stylers": [{"visibility": "off"}]
},
{
"featureType": "transit",
"elementType": "geometry",
"stylers": [{"hue": "#a43218"},{"saturation": 74},{"lightness": -51},{"visibility": "simplified"}]
},
 {
"featureType": "administrative.country",
"elementType": "labels",
"stylers": [{"visibility": "off"}]
},
{
"featureType": "administrative.province",
"elementType": "labels",
"stylers": [{"hue": "#ffffff"},{"saturation": 0},{"lightness": 100},{"visibility": "off"}]
},
{
"featureType": "administrative.neighborhood",
"elementType": "labels",
"stylers": [{"hue": "#ffffff"},{"saturation": 0},{"lightness": 100},{"visibility": "off"}]
},
{
"featureType": "administrative.locality",
"elementType": "labels",
"stylers": [{"hue": "#ffffff"},{"saturation": 0},{"lightness": 100},{"visibility": "on"}]
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
       
        var mapMarkers = [];
        
        $.getJSON( "<?php echo plugin_dir_url( dirname( __FILE__ ) ) . '../' ?>/assets/carta-map-markers.json", function(markers){
                
            mapMarkers = markers.markers;
            
            initMap();
        }); 
                  
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: new google.maps.LatLng(31.772543,-106.460953),
                zoom: 6,
                scrollwheel: false,
                mapTypeId: 'terrain',
                scaleControl: true,
	    	    styles: newmapstyle
            });
        

            
            for (var i = 0; i < mapMarkers.length; i++) {
                
                var markerLatLng = new google.maps.LatLng(mapMarkers[i].location.lat, mapMarkers[i].location.long);
                
                
                var setMarker = new google.maps.Marker({
                    position: markerLatLng,
                    map: map,
                    title: mapMarkers[i].name,
                    //correct modal info needs to go here : Eduardo
                    content:    mapMarkers[i]
                });
                
                google.maps.event.addListener(setMarker, "click", function(event){

                    //I have no idea what "this" is but it's what you need to select to get the info
                    
                    $("#modal-title").html(this.content.name);
                    
                    
                    /*TODO: add in some case statements to change the content between spanish and english */ 
                    $("#modal-body-location").html("Latitude:" + this.content.location.lat + "<br />" + "Longitude:" + this.content.location.long);
                    $("#modal-body-eng").html("English Description: " + this.content.englishDescr);
                    $("#modal-body-spn").html("Spanish Description: " + this.content.spanishDescr);
                    $("#map-info-modal").modal("show");
		  
                });
                
                setMarker.setMap(map);
                    
            };
                
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
        

       }
      </script>
    

    <!--<div class="bodyinside">-->

    

        <h1 class = "interactivemap">The Royal Road of the Interior Lands</h1>
        <div id="map"></div>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClIID75_mjy20fupwSmSdhWVWJqOJ7itg&callback=initMap">
        </script>

        <div id="map-info-modal" class="modal fade" role="dialog">
        
          <div class="modal-dialog">
             

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="modal-title">Modal Header</h4>
                </div>
                
                <div class="modal-body" >
                    <p id="modal-body-location">Some text in the modal.</p>
                    <p id ="modal-body-eng"></p>
                    <p id ="modal-body-spn"></p>
                </div>
        
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

          </div>
        
        </div>
        
           <!--
               Old div container/ Now using bootstrap modal
           <div id="carta-map-capture">
    		    <div id="carta-map-capture-box">
        			<h1>
        				How To Use This Map
    			    </h1>
        			<p>
        				Click a pin icon on the map to the left.  The information will display here.
        			</p>
		        </div>
	        </div> -->

        
    <!--</div>-->
