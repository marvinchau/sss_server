/**
 * 
 */
var api_url = "../API/WebAPI.php";


$(document).ready(function(){
	
	
	$("#submitAddObservee").click(function()
	{
		if(validate()){
			submit();
		}else{
			showCommonDialog("Warning", "Invalid input.");
		}
	});
});


function validate(){
	
	var name = $("#inputLoginName").val();
	var pwd = $("#inputPassword").val();
	var cPwd = $("#confirmPassword").val();
	
	if(name == null || name == "" || pwd == null || pwd == "" || cPwd == null || cPwd == ""){
		return false;
	}
	
	if(pwd != cPwd){
		return false;
	}	
	
	return true;
}

function submit(){

	var name = $("#inputLoginName").val();
	var pwd = $("#inputPassword").val();
	var cPwd = $("#confirmPassword").val();
	
	var params = {"params":'{"action":"addUser", \
							"name"			: "'+name+'",\
							"type"			: "P",\
							"password"		: "'+pwd+'"}'
				};
	
	$.requestAPI(
			api_url,
			params,
			 function(data) {
				if (data['result'] == "success") {
					$("#inputLoginName").val("");
					$("#inputPassword").val("");
					$("#confirmPassword").val("");
					showCommonDialog("Success", "User add success");

				} else {
					showCommonDialog("Warning", data['err_msg']);
				}
			 }, 
			 function(data){
				 showCommonDialog("Warning", "Incorrect login information!");
			 }
	);
	
}