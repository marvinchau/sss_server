/**
 * 
 */
var api_url = "../API/WebAPI.php";

var content_observeeMgr = "./pages/layout/ObserverManagement.php";
var content_observeeAdd = "./pages/layout/observerAdd.php";

$(document).ready(function(){
	
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
	
	
	$("#sidebar-observee-mgr").click(function(){
		updateSideBar($(this));
		$.requestPageContent(
				content_observeeMgr, 
				null,
				function(data){
					$("#page_content").empty();
					$("#page_content").append(data);
				},
				function(data){
					$("#page_content").append("Page not found!!!");
				});
	});
	

	
	$("#sidebar-observee-add").click(function(){
		updateSideBar($(this));
		$.requestPageContent(
				content_observeeAdd, 
				null,
				function(data){
					$("#page_content").empty();
					$("#page_content").append(data);
				},
				function(data){
					$("#page_content").append("Page not found!!!");
				});
	});
});


function updateSideBar(obj){
	
	obj.parent().parent().parent().find("li").removeClass("active");
	obj.parent().addClass("active");
	
}

function initObserveeList(content_url, params, sCallback, fCallback){
	
//	var params = {"params":'{"action":"getUsers", "type":"P"}'};
//	var params = {
//					"params"	:	'{	"action"		: "login", \
//										"name"			: "'+user_name+'",\
//										"type"			: "A",\
//										"password"		: "'+pwd+'"}'
//				 };
//	$.requestAPI(api_url, 
//				 params, 
//				 function(data) {
//					if (data['result'] == "success") {
//						
//						var items = data['data']['users'];
//						
//						$.each(items, function(i, item){
//							
//							$('')
//						});
//						
//					} else {
//						showCommonDialog("Warning", data['err_msg']);
//					}
//				 }, 
//				 function(data){
//					 showCommonDialog("Warning", "Incorrect login information!");
//	});
	
	$.requestPageContent(content_url, 
			 params,
			 sCallback,
			 fCallback			 
	);
}