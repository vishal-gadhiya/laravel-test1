$('#users_listing').DataTable({
	responsive: !0,
	orderCellsTop: !0,
	processing: !0,
	order: [[0, "desc"]],
	columnDefs: [{
		targets: [-1],
		orderable: !1,
	}]
});
$('#blogs_listing').DataTable({
	responsive: !0,
	orderCellsTop: !0,
	processing: !0,
	order: [[0, "desc"]],
	columnDefs: [{
		targets: [-1],
		orderable: !1,
	}]
});

if($('#accordionSidebar .active .collapsed').length){
	$('#accordionSidebar .active .collapsed').removeClass('collapsed');
	$('#accordionSidebar .active .collapse').addClass('show');
}

/* toast message */
function boostrapNotify(type,msg,title)
{
	toastr[type](msg,title,{
        progressBar:true,
        closeButton:true,
        showDuration: 100,
    });
}
if(typeof success_message !== 'undefined'){
	boostrapNotify('success',success_message,'Success');
}
if(typeof error_message !== 'undefined'){
	boostrapNotify('error',error_message,'Error');
}
if(typeof info_message !== 'undefined'){
	boostrapNotify('info',info_message,'Info');
}
/* Loader */
function waitMe(effect,color,text)
{
	$('body').waitMe({
        effect : effect,
        bg : 'rgba(255,255,255,0.4)',
        color : color,
        text : text,
    });
}
$('.waitme').on('click', function(){
	if($(this).parents('form').valid()){
		waitMe('roundBounce','#4e73df','Please wait...');
	}
});
/* Sweet alert */
$(document).on('click', '.delete-confirmation', function(event){
	event.preventDefault(); // prevent form submit
	var form = $(this).parents('form')[0]; // storing the form
	swal({
		title: "Are you sure",
		text: "you want to delete this record?",
		type: "warning",
		showCancelButton: true,
		//confirmButtonColor: "#DD6B55",
		confirmButtonText: "Yes, Delete it.",
		cancelButtonText: "No, Cancel it.",
		closeOnConfirm: false
	}, function(isConfirm){
		if(isConfirm){
			form.submit(); // submitting the form when user press yes
		} else {
			return false;
		}
	});
});


function showAjaxErros(jqXHR,exception){
	if(jqXHR.status === 0){
		msg = 'Not connect. Verify Network.';
	}else if(jqXHR.status == 404){
		msg = 'Requested page not found. [404]';
	}else if(jqXHR.status == 500){
		msg = 'Internal Server Error [500].';
	}else if(exception === 'parsererror'){
		msg = 'Requested JSON parse failed.';
	}else if(exception === 'timeout'){
		msg = 'Time out error.';
	}else if(exception === 'abort'){
		msg = 'Ajax request aborted.';
	}else{
		msg = 'Uncaught Error.' + jqXHR.responseText;
	}
	boostrapNotify('error',msg,'Error');
}
