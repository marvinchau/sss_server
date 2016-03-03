/**
 * 
 */
var api_url = "../API/WebAPI.php";

$(document).ready(function(){
	
	initObserveeList();
});

function initObserveeList(){
	
	var params = {"params":'{"action":"getUsers", "type":"P"}'};
//	var params = {
//					"params"	:	'{	"action"		: "login", \
//										"name"			: "'+user_name+'",\
//										"type"			: "A",\
//										"password"		: "'+pwd+'"}'
//				 };
	$.requestAPI(api_url, 
				 params, 
				 function(data) {
					if (data['result'] == "success") {
						
						var items = data['data']['users'];
						
						$.each(items, function(i, item){
							
							$('')
						});
						
					} else {
						showCommonDialog("Warning", data['err_msg']);
					}
				 }, 
				 function(data){
					 showCommonDialog("Warning", "Incorrect login information!");
		});
}