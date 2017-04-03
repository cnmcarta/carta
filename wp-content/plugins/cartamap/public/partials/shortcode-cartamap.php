<script>
		jQuery('document').ready(function(){
			jQuery('#captureBox h1,p').delay(1000).animate({left: 0}, 1000);
		});
</script>


    <script>
    var map;
    var src = 'http://carta.korwest.com/wp-content/plugins/cartamap/assets/cartamap.kml?cachebust='+(new Date()).getTime();
    
    var cameraMarker = {
        path: 'M928 832q0-14-9-23t-23-9q-66 0-113 47t-47 113q0 14 9 23t23 9 23-9 9-23q0-40 28-68t68-28q14 0 23-9t9-23zm224 130q0 106-75 181t-181 75-181-75-75-181 75-181 181-75 181 75 75 181zm-1024 574h1536v-128h-1536v128zm1152-574q0-159-112.5-271.5t-271.5-112.5-271.5 112.5-112.5 271.5 112.5 271.5 271.5 112.5 271.5-112.5 112.5-271.5zm-1024-642h384v-128h-384v128zm-128 192h1536v-256h-828l-64 128h-644v128zm1664-256v1280q0 53-37.5 90.5t-90.5 37.5h-1536q-53 0-90.5-37.5t-37.5-90.5v-1280q0-53 37.5-90.5t90.5-37.5h1536q53 0 90.5 37.5t37.5 90.5z',
        fillColor: '#dd4b39',
        fillOpacity: 1,
        scale: 0.015,
        strokeColor: 'white',
        strokeWeight: 1.5
    };
    
    
    var infoMarker = {
        path: 'M1152 1376v-160q0-14-9-23t-23-9h-96v-512q0-14-9-23t-23-9h-320q-14 0-23 9t-9 23v160q0 14 9 23t23 9h96v320h-96q-14 0-23 9t-9 23v160q0 14 9 23t23 9h448q14 0 23-9t9-23zm-128-896v-160q0-14-9-23t-23-9h-192q-14 0-23 9t-9 23v160q0 14 9 23t23 9h192q14 0 23-9t9-23zm640 416q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z',
        fillColor: '#dd4b39',
        fillOpacity: 1,
        scale: 0.015,
        strokeColor: 'white',
        strokeWeight: 1.5
    };

    var videoMarker = {
        path: 'M1792 352v1088q0 42-39 59-13 5-25 5-27 0-45-19l-403-403v166q0 119-84.5 203.5t-203.5 84.5h-704q-119 0-203.5-84.5t-84.5-203.5v-704q0-119 84.5-203.5t203.5-84.5h704q119 0 203.5 84.5t84.5 203.5v165l403-402q18-19 45-19 12 0 25 5 39 17 39 59z',
        fillColor: '#dd4b39',
        fillOpacity: 1,
        scale: 0.015,
        strokeColor: 'white',
        strokeWeight: 1.5
    };

    var cameragray = {
        path: 'M928 832q0-14-9-23t-23-9q-66 0-113 47t-47 113q0 14 9 23t23 9 23-9 9-23q0-40 28-68t68-28q14 0 23-9t9-23zm224 130q0 106-75 181t-181 75-181-75-75-181 75-181 181-75 181 75 75 181zm-1024 574h1536v-128h-1536v128zm1152-574q0-159-112.5-271.5t-271.5-112.5-271.5 112.5-112.5 271.5 112.5 271.5 271.5 112.5 271.5-112.5 112.5-271.5zm-1024-642h384v-128h-384v128zm-128 192h1536v-256h-828l-64 128h-644v128zm1664-256v1280q0 53-37.5 90.5t-90.5 37.5h-1536q-53 0-90.5-37.5t-37.5-90.5v-1280q0-53 37.5-90.5t90.5-37.5h1536q53 0 90.5 37.5t37.5 90.5z',
        fillColor: 'grey',
        fillOpacity: 0.25,
        scale: 0.015,
        strokeColor: 'white',
        strokeWeight: 1.5
      };

    var infogray = {
        path: 'M1152 1376v-160q0-14-9-23t-23-9h-96v-512q0-14-9-23t-23-9h-320q-14 0-23 9t-9 23v160q0 14 9 23t23 9h96v320h-96q-14 0-23 9t-9 23v160q0 14 9 23t23 9h448q14 0 23-9t9-23zm-128-896v-160q0-14-9-23t-23-9h-192q-14 0-23 9t-9 23v160q0 14 9 23t23 9h192q14 0 23-9t9-23zm640 416q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z',
        fillColor: 'grey',
        fillOpacity: 0.25,
        scale: 0.015,
        strokeColor: 'white',
        strokeWeight: 1.5
    };

    var videogray = {
        path: 'M1792 352v1088q0 42-39 59-13 5-25 5-27 0-45-19l-403-403v166q0 119-84.5 203.5t-203.5 84.5h-704q-119 0-203.5-84.5t-84.5-203.5v-704q0-119 84.5-203.5t203.5-84.5h704q119 0 203.5 84.5t84.5 203.5v165l403-402q18-19 45-19 12 0 25 5 39 17 39 59z',
        fillColor: 'grey',
        fillOpacity: 0.25,
        scale: 0.015,
        strokeColor: 'white',
        strokeWeight: 1.5
    };
    
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
        
        jQuery.getJSON( "<?php echo plugin_dir_url( dirname( __FILE__ ) ) ?>/assets/carta-map-markers.json", function(markers){
                
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
                fullscreenControl: false,
	    	    styles: newmapstyle
            });

            
            for (var i = 0; i < mapMarkers.length; i++) {
                
                var markerLatLng = new google.maps.LatLng(mapMarkers[i].location.lat, mapMarkers[i].location.long);
                
                var icon = infoMarker;
                
                var iconGray = infogray;
                
                if(mapMarkers[i].imageUrl != ""){
                    icon = cameraMarker;
                    
                    iconGray = cameragray;
                }
                if(mapMarkers[i].videoUrl != ""){
                    icon = videoMarker;
                    
                    iconGray = videogray;
                }
                
                var setMarker = new google.maps.Marker({
                    position: markerLatLng,
                    map: map,
                    title: mapMarkers[i].name,
                    icon: icon,
                    iconGray: iconGray,
                    content:    mapMarkers[i]
                });
                
                google.maps.event.addListener(setMarker, "click", function(event){
                    
                    this.setIcon(this.iconGray);
                    
                    jQuery("#modal-title").html(this.content.englishName);
                    
                    /*To add in some case statements to change the content between spanish and english */ 
                    //jQuery("#modal-body-location").html("Latitude: " + this.content.location.lat + ", <br>" + "Longitude: " + this.content.location.long);
                    jQuery("#modal-body-eng").html( this.content.englishDescr);
                    jQuery("#modal-body-spn").html( this.content.spanishDescr);
                    
                    // prepare divs for hiding/showing based on content present.
                    // if there is no video, or no image, then we hide the div that houses them.
                    jQuery("#modal-body-vid").html("");
                    jQuery("#video-modal").addClass("carta-modal-nodisplay");
                    jQuery("#modal-body-img").html("");
                    jQuery("#image-modal").addClass("carta-modal-nodisplay");
                    
                    var videoBool = false; // false means content is not present. True means content is present. 
                    var imageBool = false; // false means content is not present. True means content is present.
                    
                     // check for content. If there is content, add content to div and remove class that hides the div.
                     if (this.content.videoUrl != "") {
                         jQuery("#video-modal").removeClass("carta-modal-nodisplay");
                         jQuery("#modal-body-vid").html('<embed id="modal-video" src="' + this.content.videoUrl + '"/>');
                         videoBool = true;
                         
                     }
                     if (this.content.imageUrl != "") {
                         jQuery("#image-modal").removeClass("carta-modal-nodisplay");
                         jQuery("#modal-body-img").html('<img id="modal-img" style="width:100%;" src="' + this.content.imageUrl + '"/>');
                         imageBool = true;
                     }
                     
                     jQuery("#text-modal").addClass("col-md-4");
                     
                     if (videoBool == false && imageBool == false) {
                         jQuery("#text-modal").removeClass("col-md-4");
                         jQuery("#text-modal").addClass("col-md-6");
                     }
                   
                    jQuery("#map-info-modal").modal("show");
		  
                });
                
                setMarker.setMap(map);
                    
            };
                
            loadKmlLayer(src, map);
        }
        
    jQuery("#video-modal").on('hidden.bs.modal', function (e) {
        jQuery("#video-modal iframe").attr("src", jQuery("#video-modal embed").attr("src"));
    });

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

        <div id="map"></div>
     
 
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClIID75_mjy20fupwSmSdhWVWJqOJ7itg&callback=initMap">
        </script>

        <div id="map-info-modal" class="modal fade" role="dialog">
        
          <div class="modal-dialog">
             

            <!-- Modal content-->
            <div class="">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h1 class="modal-title" id="modal-title"><?php _e('Modal Header', 'cartamap'); ?></h1>
                          <div class="modal-lang-switch">
                            
                            <label class="carta_switch">
                              <input class="carta_checkbox" type="checkbox">
                              <div class="carta_slider carta_round"></div> 
                            </label>
                            <span style="display:none" class="carta_lang_toggle active">English</span>
                            <span class="carta_lang_toggle active">Espa&ntilde;ol</span>
                            
                            
                        </div>
                                <script>
                                jQuery( ".carta_checkbox" ).click(function() {
                                    jQuery( ".carta_lang_toggle" ).toggle();
                                });
                                </script>
                        
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4" id="text-modal">
                                <h4><?php _e('Info', 'cartamap'); ?></h4>
                                <p class="carta_lang_toggle" id ="modal-body-eng"></p>
                                <p class="carta_lang_toggle" style="display: none" id ="modal-body-spn"></p>
                            </div>
                            <div class="col-md-4  carta-modal-nodisplay carta-video-div" id="video-modal">
                                <h4><?php _e('Videos', 'cartamap'); ?></h4>
                                <div id = "modal-body-vid"class = "embed-responsive embed-responsive-16by9"></div>
                            </div>
                            <div class="col-md-4 carta-modal-nodisplay" id="image-modal">
                                <h4><?php _e('Pictures', 'cartamap'); ?></h4>
                                <div id = "modal-body-img"></div>
                            </div>
                        </div>
                    </div>
            
                    <div class="modal-footer">
                        <img class="carta-logo" src="/wp-content/plugins/cartamap/assets/carta-logo.png"></img>
                        <img class="carta-mini-logo" src="/wp-content/plugins/cartamap/assets/mini-carta-logo.png"></img>
                        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                    </div>
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
