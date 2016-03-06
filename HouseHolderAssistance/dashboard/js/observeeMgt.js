/**
 * 
 */
var api_url = "../API/WebAPI.php";


$(document).ready(function(){
	
	
	$(".func-observee-inactive").click(function()
	{
//		alert($(this).parent().parent().attr("userid"));
		updateStatus($(this).parent().parent().attr("userid"), "I");
	});

	
	$(".func-observee-active").click(function()
	{
//		alert($(this).parent().parent().attr("userid"));
		updateStatus($(this).parent().parent().attr("userid"), "N");

	});
	
	$(".func-observee-location").click(function()
	{
//		alert($(this).parent().parent().attr("userid"));
//		init($(this).parent().parent().attr("userid"), "N");

		var params = {"userID":$(this).parent().parent().attr("userid"),"userName":$(this).parent().parent().attr("username")};
		
		updateSideBar($('#sidebar-observee-map'));
		$.requestPageContent(
				content_observeeMap, 
				params,
				function(data){
					$("#page_content").empty();
					$("#page_content").append(data);
				},
				function(data){
					$("#page_content").append("Page not found!!!");
				}
		);

	});
});



function updateStatus(userID, status){

	var params = {"params":'{"action":"updateUserStatus", \
							"userId"			: "'+userID+'",\
							"status"			: "'+status+'"}'
				};
	
	$.requestAPI(
			api_url,
			params,
			 function(data) {
				if (data['result'] == "success") {
//					$("#inputLoginName").val("");
//					$("#inputPassword").val("");
//					$("#confirmPassword").val("");
					
					initObserveeList(
							content_observeeMgr, 
							null,
							function(data){
								$("#page_content").empty();
								$("#page_content").append(data);
							},
							function(data){
								$("#page_content").append("Page not found!!!");
							}
					);
					
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
