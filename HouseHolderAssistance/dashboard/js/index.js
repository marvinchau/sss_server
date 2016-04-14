/**
 * 
 */
var api_url = "../API/WebAPI.php";

var content_observeeMgr = "./pages/layout/observeeMgt.php";
var content_observeeAdd = "./pages/layout/observeeAdd.php";
var content_observerMgr = "./pages/layout/observerMgt.php";
var content_observerAdd = "./pages/layout/observerAdd.php";
var content_observerGrp = "./pages/layout/observerGrp.php";
var content_observeeMap = "./pages/layout/observeeMap.php";

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

//	$("#sidebar-observee-map").click(function(){
//		updateSideBar($(this));
//		$.requestPageContent(
//				content_observeeMap, 
//				null,
//				function(data){
//					$("#page_content").empty();
//					$("#page_content").append(data);
//				},
//				function(data){
//					$("#page_content").append("Page not found!!!");
//				});
//	});
	

	$("#sidebar-observer-mgr").click(function(){
		updateSideBar($(this));
		$.requestPageContent(
				content_observerMgr, 
				null,
				function(data){
					$("#page_content").empty();
					$("#page_content").append(data);
				},
				function(data){
					$("#page_content").append("Page not found!!!");
				});
	});
	

	
	$("#sidebar-observer-add").click(function(){
		updateSideBar($(this));
		$.requestPageContent(
				content_observerAdd, 
				null,
				function(data){
					$("#page_content").empty();
					$("#page_content").append(data);
				},
				function(data){
					$("#page_content").append("Page not found!!!");
				});
	});
	
	

	$("#sidebar-observer-grp").click(function(){
		updateSideBar($(this));
		$.requestPageContent(
				content_observerGrp, 
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
	$.requestPageContent(content_url, 
			 params,
			 sCallback,
			 fCallback			 
	);
}