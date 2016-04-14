/**
 * 
 */


//var popup = null;
//
// jquery extend function
$.extend(
{
    redirectPost: function(location, args)
    {
        var form = '';
        $.each( args, function( key, value ) {
            value = value.split('"').join('\"');
            form += '<input type="hidden" name="'+key+'" value="'+value+'">';
        });
        $('<form action="' + location + '" method="POST">' + form + '</form>').appendTo($(document.body)).submit();
    }


});
//
//$.extend(
//{
//	newWindowPost: function(location, args, width, height, windowName)
//	{
//		
////		alert(args);
//		function startPost(location, args){
//	        var form = '';
//	        $.each( args, function( key, value ) {
//	            value = value.split('"').join('\"');
//	            form += '<input type="hidden" name="'+key+'" value="'+value+'">';
//	        });
//	        $('<form action="' + location + '" method="POST" target="'+windowName+'">' + form + '</form>').appendTo($(document.body)).submit();
//		}
//		
//		popup = window.open("", windowName, 'width='+width+', height='+height);
//		setTimeout(startPost(location, args), 50);
//	}
//	
//});
//
//
$.extend(
{
	requestAPI: function(api_url, params, successCallback, failCallback){
		$.ajax({
			url: 		api_url,
			type: 		"POST",
			dataType: 	"json",
			data:		params,
			success:	function(data) {
				successCallback(data);
			},
			error:		function(data) {
				failCallback(data);
			}
		});
	}
});



$.extend(
{
	requestPageContent: function(content_url, params, successCallback, failCallback)
	{
		$.ajax({
			url: 		content_url,
			type: 		"POST",
			dataType: 	"html",
			data:		params,
			success:	function(data) {
				successCallback(data);
			},
			error:		function(data) {
				failCallback(data);
			}
		});
	}
}		
);

//
//$.extend({
//	closeWindow: function() {
//		if (popup != null) {
//			popup.close();
//		}
//	}
//});






/********* Handle Ajax Error Response ********/

function commonErrorHandler(data, title, callback){
	if(data['err_code'] == 5001){
		if(callback != null){
			callback();
		}else{
			logout();
		}
	}else{	
		showCommonDialog(title, data['err_msg'] + "("+ data['err_code']+")" );
	}
}

function logout(){
	window.location.href("./login.php");
}

/******************* Common Dialog *********************/

function showCommonDialog(title, msg){
	
	if(!$("#commonAlertDialog").length){
		var dialog = '<div class="modal fade" tabindex="-1" role="dialog" id="commonAlertDialog">'+
						'<div class="modal-dialog">'+
		  				'<div class="modal-content">'+
		    '<div class="modal-header">'+
		      '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
		     ' <h4 class="modal-title" id="commonAlertDialog_title">Alert</h4>'+
		    '</div>'+
		    '<div class="modal-body">'+
		      '<p  id="commonAlertDialog_msg"></p>'+
		    '</div>'+
		    '<div class="modal-footer">'+
		      '<button type="button" class="btn btn-default" data-dismiss="modal" id="dialogClose">Close</button>'+
		    '</div>'+
		  '</div><!-- /.modal-content -->'+
		'</div><!-- /.modal-dialog -->'+
		'</div><!-- /.modal -->';

		$('body').append(dialog);
	}

	$("#commonAlertDialog_title").html(title);
	$("#commonAlertDialog_msg").html(msg);
	$("#commonAlertDialog").modal('show');
}

function hideCommonDialog(){

	if($("#commonAlertDialog").length){
		$("#commonAlertDialog").modal('hide');
	}
}

/******************* Loading Dialog ********************/

function showLoadingDialog(){
	
	if(!$("#loadingDialog").length){
	
	
		var dialog = '<div id="loadingDialog" class="modal fade" tabindex="-1" role="dialog">'+
		  '<div class="modal-dialog">'+
		   ' <div class="modal-content">'+
		    '<div class="modal-header">'+  
		     '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +  
		      '<h4 class="modal-title">Loading</h4>'+  
		     '</div>' +
		      '<div class="modal-body">'+
			  '<div class="progress">'+	
			'<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">'+	  
		'<span class="sr-only">Loading</span>'+		    
		' </div>'+		 
		'</div>'+		
		 '</div>'+     
		  '<div class="modal-footer">' +   
		   '</div>'+   
		   '</div><!-- /.modal-content -->'+ 
		  '</div><!-- /.modal-dialog -->'+
		'</div><!-- /.modal -->';
		
		$('body').append(dialog);
	}
	$("#loadingDialog").modal('show');
}

function hideLoadingDialog(){

	if($("#loadingDialog").length){
		$("#loadingDialog").modal('hide');
	}
}



