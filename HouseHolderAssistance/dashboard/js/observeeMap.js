/**
 * 
 */
var api_url = "../API/WebAPI.php";
var map;
var markers = [];
var flightPath = null;

$(document).ready(function() {

	
	var today = new Date();
	var d = today.getDate();
	var m =  today.getMonth();
	m += 1;  // JavaScript months are 0-11
	var y = today.getFullYear();
	
	var datepicker = $('#sandbox-container div').datepicker({
	    format: "yyyy-mm-dd",
	    endDate: y + "/" + m + "/" + (d+1)
	});
	
	$('#sandbox-container div').on("changeDate", function() {
//		alert($(this).datepicker('getFormattedDate'));
		
		getObserveeLatLngs($('#userid').attr('userid'), $(this).datepicker('getFormattedDate'));
	});
	
	
	$("#submitAddObservee").click(function() {
		if (validate()) {
			submit();
		} else {
			showCommonDialog("Warning", "Invalid input.");
		}
	});

});

function drawMarkers(latlngs) {

	// var LatLng1 = {lat: 22.32046, lng: 114.2111681};
	// var LatLng2 = {lat: 22.3203763, lng: 114.2112085};
	// var LatLng3 = {lat: 22.3204283, lng: 114.2111465};
	// var LatLng4 = {lat: 22.3202875, lng: 114.2113402};
	//
	// var flightPlanCoordinates = [
	// LatLng1,
	// LatLng2,
	// LatLng3,
	// LatLng4,
	// ];
	flightPath = new google.maps.Polyline({
		path : latlngs,
		geodesic : true,
		strokeColor : '#FF0000',
		strokeOpacity : 1.0,
		strokeWeight : 2
	});

	// alert(JSON.stringify(flightPlanCoordinates));
	flightPath.setMap(map);

//	var labels = '01234567890ABCDEF';
//	var labelIndex = 0;
//	// addMarker(LatLng1, map, "1");
	for (i = 0; i < latlngs.length; i++) {
//		alert(i+1);
		if(i==0){
			addMarker(latlngs[i], map, "S");

		    var center = new google.maps.LatLng(latlngs[i]['lat'], latlngs[i]['lng']);
		    // using global variable:
		    map.panTo(center);
			
		}else if(i == (latlngs.length -1)){

			addMarker(latlngs[i], map, "E");
//			alert(latlngs[i][lat]);

		    var center = new google.maps.LatLng(latlngs[i]['lat'], latlngs[i]['lng']);
		    // using global variable:
		    map.panTo(center);
		}
//		else{
//
//			addMarker(latlngs[i], map, "");
//		}
	}

}

function initMap() {

	map = new google.maps.Map(document.getElementById('map'), {
		zoom : 17,
		center : {
			lat : 22.3203589,
			lng : 114.211341
		},
		mapTypeId : google.maps.MapTypeId.TERRAIN
	});
	
//	var today = new Date();
	var formattedDate = new Date();
	var d = formattedDate.getDate();
	var m =  formattedDate.getMonth();
	m += 1;  // JavaScript months are 0-11
	var y = formattedDate.getFullYear();

//	alert(d + "." + m + "." + y);
//	alert(today.toDateString());
	
	
	getObserveeLatLngs($('#userid').attr('userid'), y+'-' +m+ '-'+d);

	
}

// Adds a marker to the map.
function addMarker(location, mapA, label) {
	// Add the marker at the clicked location, and add the next-available label
	// from the array of alphabetical characters.
//	 alert(location);
	if(label == "" && label == null){
		var marker = new google.maps.Marker({
			position : location,
			map : mapA
		});
	}else{
		var marker = new google.maps.Marker({
			position : location,
			label : label,
			map : mapA
		});
	}
	
	markers.push(marker);
}

function getObserveeLatLngs(userid, date) {

//	alert(userid);
//	alert(date);
//	{"action":"getObserveeLocationByDate", "observeeId":6, "date":"2016-03-04"}
	
//	var params = {
//		"params" : '{"action":"getObserveeLocationByDate", \
//							"observeeId"			: "' + userid+ '",\
//							"date"		: "' + date+ '"}'
//	};
	var params = {
			"params" : '{"action":"getObserveeLocationByDate", \
								"observeeId"			: "' + userid+ '",\
								"date"		: "' + date+ '"}'
		};

	$.requestAPI(api_url, params, function(data) {
		if (data['result'] == "success") {
				if(flightPath != null){
					flightPath.setMap(null);
				}
			
			  for (var i = 0; i < markers.length; i++) {
				    markers[i].setMap(null);
				  }
//			alert(JSON.stringify(data));
//			alert(111);
//			var latlng = {lat: 22.32046, lng: 114.2111681};
//			addMarker(latlng, map, "A");
			
//			var records = data['data']['records'];
//
//			for (i = 0; i < records.length; i++) {
//				
////				var latval = parseFloat(records[i]['position']['lat']);
////				var lngval = parseFloat(records[i]['position']['lng']);
////				var latlng = {lat: latval, lng: lngval};
//				var latlng = {lat: 22.32046, lng: 114.2111681};
//				addMarker(latlng, map, "" + (i+1));
//			}
//			alert(data['data'].records.length);
//			alert(JSON.stringify(data));
			if(data['data'].records.length > 0){
				var latlngs = [];
				
				$.each(data['data']['records'], function(index, value){
					
					var lat = parseFloat(value['position']['lat']);
					var lng = parseFloat(value['position']['lng']);
	//				alert(lat);
	//				alert(lng);
					var latlng = {lat: lat,lng: lng};
	//				alert(JSON.stringify(latlng));
					latlngs.push(latlng);
					
	
	//				addMarker(latlng, map, "" + (index+1));
				});
				
	//			alert(JSON.stringify(latlngs));
				drawMarkers(latlngs);
	//			showCommonDialog("Success", "User add success");
			}else{

				showCommonDialog("Warning", "No Location Record Found");
			}

		} else {
			showCommonDialog("Warning", data['err_msg']);
		}
	}, function(data) {
		alert(JSON.stringify(data));
		showCommonDialog("Warning", "Incorrect login information!");
	});

}