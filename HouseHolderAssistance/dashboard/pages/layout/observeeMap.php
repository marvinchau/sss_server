
<?php 


?>

<html>
<head>
	<script type="text/javascript" src="./lib/js/bootstrap-datepicker-1.5.1-dist/js/bootstrap-datepicker.min.js"></script>  
	<script type="text/javascript" src="./js/observeeMap.js"></script>      
	<style>

      #map {
        height: 500px;
      }
    </style>   
    <link rel="stylesheet" href="./lib/js/bootstrap-datepicker-1.5.1-dist/css/bootstrap-datepicker3.min.css">
<!-- 
    <script>
    
      var map;
      function initMap() {


    	  var map = new google.maps.Map(document.getElementById('map'), {
    	    zoom: 20,
    	    center: {lat: 22.32046, lng: 114.2111681},
    	    mapTypeId: google.maps.MapTypeId.TERRAIN
    	  });

    	  var LatLng1 = {lat: 22.32046, lng: 114.2111681};
    	  var LatLng2 = {lat: 22.3203763, lng: 114.2112085};
    	  var LatLng3 = {lat: 22.3204283, lng: 114.2111465};
    	  var LatLng4 = {lat: 22.3202875, lng: 114.2113402};

    	  var flightPlanCoordinates = [
    	                       	    LatLng1,
    	                       	    LatLng2,
    	                       	    LatLng3,
    	                       	    LatLng4,
    	                       	  ];

//     	  var flightPlanCoordinates = [
//     	    {lat: 22.32046, lng: 114.2111681},
//     	    {lat: 22.3203763, lng: 114.2112085},
//     	    {lat: 22.3204283, lng: 114.2111465},
//     	    {lat: 22.3202875, lng: 114.2113402}
//     	  ];
    	  var flightPath = new google.maps.Polyline({
    	    path: flightPlanCoordinates,
    	    geodesic: true,
    	    strokeColor: '#FF0000',
    	    strokeOpacity: 1.0,
    	    strokeWeight: 2
    	  });

//     	  alert(JSON.stringify(flightPlanCoordinates));
    	  flightPath.setMap(map);

    	  var labels = '01234567890ABCDEF';
    	  var labelIndex = 0;
//   		addMarker(LatLng1, map, "1");
		for(i=0;i<flightPlanCoordinates.length;i++){
    	  addMarker(flightPlanCoordinates[i], map, ""+i);
		}
    }

//   	function addMarkers(latlngs){

// //         var markerIdx = 1;
// // 		alert(2);
// // 		$.each(latlngs, function(index, latlng){
// // 			alert($.parseJSON(latlng));
// // 			alert(JSON.stringify(latlng));
// // 			addMarker($.parseJSON(JSON.stringify(latlng)), map, index+1);
// // 			addMarker(JSON.stringify(latlng), map, index+1);
// // 			markerIdx++;
// // 		});

// 			if(i== 0){
// 			addMarker(latlngs[i], map, "A");
// 			}
// 		}

//    }

  	// Adds a marker to the map.
  	  function addMarker(location, map, label) {
  	    // Add the marker at the clicked location, and add the next-available label
  	    // from the array of alphabetical characters.
//   	    alert(location);
  	    var marker = new google.maps.Marker({
  	      position: location,
  	      
//   	      label: label,
  	      map: map
  	    });
  	  }
    </script>    --> 
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCk-TC1x5POoraPoVZzcVB9mp0tElmBR_s
        &libraries=visualization&callback=initMap">
    </script>
</head>

<body>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Location
<!--             <small>Optional description</small> -->
        </h1>
<!--         <ol class="breadcrumb"> -->
<!--         <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li> -->
<!--         <li class="active">Here</li> -->
<!--       </ol> -->
    </section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12 col-lg-3">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Observee Information</h3>
					</div>
					<div class="box-body">
					
	                    <b>Name : </b><?php print $_POST['userName'];?>
						<input type="hidden" id="userid" userid="<?php print $_POST['userID'];?>"/>
					
						<div id="sandbox-container">
							<div></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-lg-9">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Map</h3>
					</div>
					<div class="box-body">
						<div id="map"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>