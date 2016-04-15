<!-- Header content box -->
<?php 
$title='Index';
$migas='#Index|index.php';
include "Public/layouts/menu.php";?>
      
<!-- Body content box -->
<div class="body-box">

    <div class="content-box">
        <div class="content-title">
            SubWeb
        </div>
        <div class="content-slider">
			
<style>
	#map {
	  height: 96%;
	  width: 100%;
	  position: absolute;
	  right: 0;
	  bottom: 0;
	  background-color: rgb(33,33,33);
	}
</style>

<div id="map">

</div>

<script>
	$(document).ready(function(){
	    initMap();
	    function initMap() {
		var map = new google.maps.Map(document.getElementById('map'), {
			
			center: {lat: 40.75, lng: 0.58},
			zoom: 2,
		    streetViewControl: false,
		    mapTypeControl: true,
		    mapTypeControlOptions: {
		      mapTypeIds: ['anima',google.maps.MapTypeId.TERRAIN] },
		    backgroundColor: '#333'
		});

		var moonMapType = new google.maps.ImageMapType({
		  getTileUrl: function(coord, zoom) {
		      var normalizedCoord = getNormalizedCoord(coord, zoom);
		      if (!normalizedCoord) {
		        return null;
		      }
		      var bound = Math.pow(2, zoom);
		      return '../GoogleMaps_Api/output' +
		          '/tile_' + zoom + '_' + normalizedCoord.x + '-' +(normalizedCoord.y) + '.png';
		  },
		  tileSize: new google.maps.Size(256, 256),
		  maxZoom: 5,
		  minZoom: 0,
		  radius: 1738000,
		  name: 'anima'
		});

		map.mapTypes.set('anima', moonMapType);
		map.setMapTypeId('anima');
	      }

	      // Normalizes the coords that tiles repeat across the x axis (horizontally)
	      // like the standard Google map tiles.
	      function getNormalizedCoord(coord, zoom) {
		var y = coord.y;
		var x = coord.x;

		// tile range in one direction range is dependent on zoom level
		// 0 = 1 tile, 1 = 2 tiles, 2 = 4 tiles, 3 = 8 tiles, etc
		var tileRange = 100 << zoom;

		// don't repeat across y-axis (vertically)
		if (y < 0 || y >= tileRange) {
		  return null;
		}

		// repeat across x-axis
		if (x < 0 || x >= tileRange) {
		  x = (x % tileRange + tileRange) % tileRange;
		}

		return {x: x, y: y};
	      }
	});
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkkbD7741_-gMF83eHjO5tgzW5kvx8fj8" type="text/javascript"></script>

        </div>
        <div class="content-zone">
        </div>
    </div>
</div>
        
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 




