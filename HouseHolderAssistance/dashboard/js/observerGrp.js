/**
 * 
 */
var api_url = "../API/WebAPI.php";

$(document).ready(function() {

	$(".func-grp").click(function() {
		
//		alert(1);
		$(".observe-group").find("input").each(function(){

			$(this).prop('checked', false);
			
		});
		$("#grpSection").show();
		
		var obj = $(this);
		$("#groupOwner").html("Group Owner : " + obj.attr("username"));
		$("#groupOwner").attr("userid", obj.attr("userid"));
		getGroupObservee(obj.attr("userid"), function(data) {
//			alert(JSON.stringify(data));
			
			var grpMember = data['data']['observees'];
			$.each(grpMember, function(index, value){
				
//				alert(JSON.stringify(value));
				
				$(".observe-group").find("input").each(function(){
					
					if($(this).attr("userid") == value["userID"]){
						
						$(this).prop('checked', true);
						return false;
					}
					
				});
				
			});
			
			
			
		}, function(data) {
			showCommonDialog("Warning", data['err_msg']);
		})

	});
	
	$('#submitObserverGrp').click(function() {
		updateGroupMember(
				$("#groupOwner").attr("userid"),
				function(data){},
				function(data){});
	});
});

function getGroupObservee(userId, sCallback, fCallback) {
	var params = {
		"params" : '{"action":"getGroupObservees", \
		"userId"			: "' + userId+ '"}'
	};
//	'{"action":"getGroupObservees", "userId":"2"}'

	$.requestAPI(api_url, params, function(data) {
		if (data['result'] == "success") {
			sCallback(data);

		} else {
			fCallback(data);
		}
	}, function(data) {
		showCommonDialog("Warning", "Incorrect login information!");
	});
}

function updateGroupMember(userID) {
//	'{"action":"updateGroupObservees", "observerId":"2", "observeeIds":[1, 4, 6]}'
	
	var observeeArray = [];

	$(".observe-group").find("input").each(function(){
		
		if($(this).prop("checked") == true){
			
			observeeArray.push($(this).attr("userid"));
		}
	});
	
	
	var params = {
		"params" : '{"action":"updateGroupObservees", "observerId": "'+ userID + '","observeeIds": [' + observeeArray + ']}'
	};
//	alert(JSON.stringify(observeeArray));
//	alert(JSON.stringify(params));

	$.requestAPI(api_url, params, function(data) {
		if (data['result'] == "success") {
//			alert(JSON.stringify(data));
			showCommonDialog("Success", "Group Arranged");
			$("#grpSection").hide();

		} else {
			showCommonDialog("Warning", data['err_msg']);
		}
	}, function(data) {
		showCommonDialog("Warning", "Incorrect login information!");
	});
}
