<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
		$('document').ready(function(){
			$('#captureBox h1,p').delay(1000).animate({left: 0}, 1000);
		});
</script>
<style>
        * {
            margin: 0;
        }
        body {
            background: linear-gradient(#8aa8b7, #ffffff, #ffffff, #8aa8b7);
        }
      .bodyinside {
        height: 800px;
		margin:0;
        }
		
        h1.interactivemap {
            text-align: center;
            color: #8e2f11 !important;
			/*
            font-family: 'Cormorant Unicase', serif;
            font-size: 450%;
            font-weight: bold;
            text-shadow: -1px -1px 0 #000000,
				  1px -1px 0 #000000,
				 -1px 1px 0 #000000,
				  3px 1px 0 #000000;
				  */
        }
		/*
        h2 {
            text-align: center;
            font-family: 'Norican', cursive;
            font-size: 200%;
            padding: 5px;
            background-color: #c6e3fc;
            border-bottom: 5px solid #000000;
            border-radius: 10px;
            box-shadow: 10px 10px 20px 0px #666;
        }
		*/
      #map {
       
	   height: 90%;
       width: 30%;
	   
       overflow: hidden;
       float: left;
       border: 12px outset #8e2f11;
          border-radius: 10px;
       box-shadow: 10px 10px 20px 0px #000000;
       }
      #capture {
          background-color: #000000;
       /*
	   height: 50%;
       width: 40%;
	   */
       height: 560px;
       width: 480px;
	   
       margin-left: auto;
          margin-right: auto;
       overflow: hidden;
       border: 12px outset #8e2f11;
          border-radius: 10px;
       box-shadow: 10px 10px 20px 0px #000000;
	   background-size: cover;
	   background-image: url('/wp-content/uploads/2015/11/2015-06-13-13.43.28-2.jpg');
        }
	   #captureBox{
	   height:100%;
	   width:100%;
	   background-color: rgba(0,0,0,0.6);
	   margin-top: 0;
	   padding: 20px;
	   font-family: Georgia;
	   font-weight: bold;
	   }
	   
	   #captureBox h1{
	    margin-top: 0;
	   }
	   
	   #captureBox h1, p{
	   color: white;
	   position:relative;
	   top: 100px;
	   left: 480px;
	   text-align: center;
	   max-width: 440px;
	   }
		#captureBox div div{
			color:#000;
			text-align:center;
			height:175px;
			background-color:#fff;
			margin-top:-30px;
		}
		
		
        #thePics {
            background-color: #782805;
            float: right;
            width: 20%;
            height: auto;
            margin-bottom: 20px;
            border: 10px outset #8e2f11;
            border-radius: 10px;
            box-shadow: 10px 10px 20px 0px #000000;
        }
        .space {
            margin-bottom: 10px;
        }
	
		
    </style>

    <script>
      var map;
      var src = 'http://carta.korwest.com/wp-content/plugins/cartamap/assets/cartamap.kml?cachebust='+(new Date()).getTime();

      /**
       * Initializes the map and calls the function that creates polylines.
       */
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-106.262683,31.564923),
          zoom: 2,
          mapTypeId: 'terrain',
			styles: [
				{
					"featureType": "water",
					"elementType": "geometry",
					"stylers": [
						{
							"hue": "#066763"
						},
						{
							"saturation": 34
						},
						{
							"lightness": -69
						},
						{
							"visibility": "on"
						}
					]
				},
				{
					"featureType": "landscape",
					"elementType": "geometry",
					"stylers": [
						{
							"hue": "#cfdde6"
						},
						{
							"saturation": -1
						},
						{
							"lightness": 0
						},
						{
							"visibility": "on"
						}
					]
				},
				{
					"featureType": "landscape.man_made",
					"elementType": "all",
					"stylers": [
						{
							"hue": "#cbdac1"
						},
						{
							"saturation": -6
						},
						{
							"lightness": -9
						},
						{
							"visibility": "on"
						}
					]
				},
				{
					"featureType": "road",
					"elementType": "geometry",
					"stylers": [
						{
							"hue": "#8d9b83"
						},
						{
							"saturation": -89
						},
						{
							"lightness": -12
						},
						{
							"visibility": "on"
						}
					]
				},
				{
					"featureType": "road.highway",
					"elementType": "geometry",
					"stylers": [
						{
							"hue": "#d4dad0"
						},
						{
							"saturation": -88
						},
						{
							"lightness": 54
						},
						{
							"visibility": "simplified"
						}
					]
				},
				{
					"featureType": "road.arterial",
					"elementType": "geometry",
					"stylers": [
						{
							"hue": "#bdc5b6"
						},
						{
							"saturation": -89
						},
						{
							"lightness": -3
						},
						{
							"visibility": "simplified"
						}
					]
				},
				{
					"featureType": "road.local",
					"elementType": "geometry",
					"stylers": [
						{
							"hue": "#000000"
						},
						{
							"saturation": -89
						},
						{
							"lightness": -26
						},
						{
							"visibility": "on"
						}
					]
				},
				{
					"featureType": "poi",
					"elementType": "geometry",
					"stylers": [
						{
							"hue": "#782805"
						},
						{
							"saturation": 61
						},
						{
							"lightness": -45
						},
						{
							"visibility": "on"
						}
					]
				},
				{
					"featureType": "poi.park",
					"elementType": "all",
					"stylers": [
						{
							"hue": "#8aa8b7"
						},
						{
							"saturation": -46
						},
						{
							"lightness": -28
						},
						{
							"visibility": "on"
						}
					]
				},
				{
					"featureType": "transit",
					"elementType": "geometry",
					"stylers": [
						{
							"hue": "#a43218"
						},
						{
							"saturation": 74
						},
						{
							"lightness": -51
						},
						{
							"visibility": "simplified"
						}
					]
				},
				{
					"featureType": "administrative.province",
					"elementType": "all",
					"stylers": [
						{
							"hue": "#ffffff"
						},
						{
							"saturation": 0
						},
						{
							"lightness": 100
						},
						{
							"visibility": "simplified"
						}
					]
				},
				{
					"featureType": "administrative.neighborhood",
					"elementType": "all",
					"stylers": [
						{
							"hue": "#ffffff"
						},
						{
							"saturation": 0
						},
						{
							"lightness": 100
						},
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
							"hue": "#ffffff"
						},
						{
							"saturation": 0
						},
						{
							"lightness": 100
						},
						{
							"visibility": "off"
						}
					]
				},
				{
					"featureType": "administrative.land_parcel",
					"elementType": "all",
					"stylers": [
						{
							"hue": "#ffffff"
						},
						{
							"saturation": 0
						},
						{
							"lightness": 100
						},
						{
							"visibility": "off"
						}
					]
				},
				{
					"featureType": "administrative",
					"elementType": "all",
					"stylers": [
						{
							"hue": "#3a3935"
						},
						{
							"saturation": 5
						},
						{
							"lightness": -57
						},
						{
							"visibility": "off"
						}
					]
				},
				{
					"featureType": "poi.medical",
					"elementType": "geometry",
					"stylers": [
						{
							"hue": "#cba923"
						},
						{
							"saturation": 50
						},
						{
							"lightness": -46
						},
						{
							"visibility": "on"
						}
					]
				},
				{
					"featureType": "administrative",
					"elementType": "labels.text.fill",
					"stylers": [
						{
							"color": "#444444"
						}
					]
				},				
			]
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
