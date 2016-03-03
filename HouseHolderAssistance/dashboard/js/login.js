/**
 * 
 */
var api_url = "../API/WebAPI.php";

$(document).ready(function(){
	
	$('#inputPassword').val('');

	$("#loginSubmit").on('click', function(e){
		
		if (validate()) {
			checkAccount();
		} else {
			showCommonDialog("Warning", "Invalid login.");
		}

	});
});

function validate() {
	
	if ($('#inputLogin').val() == null || $('#inputLogin').val() == "") {
		return false;
	}
	if ($('#inputPassword').val() == null || $('#inputPassword').val() == "") {
		return false;
	}	
	return true;
}


function checkAccount() {
	var user_name = $('#inputLogin').val();
	var pwd		  = $('#inputPassword').val();
	
	var params = {
					"params"	:	'{	"action"		: "login", \
										"name"			: "'+user_name+'",\
										"type"			: "A",\
										"password"		: "'+pwd+'"}'
				 };
	$.requestAPI(api_url, 
				 params, 
				 function(data) {
					if (data['result'] == "success") {
//						window.location.href = "index.php";
						window.location.href = "starter.php";
					} else {
						showCommonDialog("Warning", data['err_msg']);
					}
				 }, 
				 function(data){
					 showCommonDialog("Warning", "Incorrect login information!");
				 });
	
}