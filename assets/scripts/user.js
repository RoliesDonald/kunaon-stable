$(document).ready(function(){

	if(document.getElementById('TableUser')!=null){
	 	App.setDataTables('#TableUser','api/datatables/user');
	}
	
	// Parent
	$('.parent').on('ifChecked', function(event){
	    var val = $(this).val();
	    $(".child_"+val).iCheck('check');
	    triggeredByChild = false;
	});

	$('.parent').on('ifUnchecked', function (event) {
		var val = $(this).val();
	    if (!triggeredByChild) {
	       $(".child_"+val).iCheck('uncheck');
	    }
	    triggeredByChild = false;
	});

	// Cheked All Users
	$('#all').on('ifChecked', function(event){
	    $('input[type="checkbox"]').iCheck('check');
   		triggeredByChild = false;
	});

	$('#all').on('ifUnchecked', function (event) {
	    if (!triggeredByChild) {
	        $('input[type="checkbox"]').iCheck('uncheck');
	    }
	    triggeredByChild = false;
	});

	// Chcked Selected
	if (typeof selected !== 'undefined') {
   	    for(i=0;i<selected.length;i++){
   	    	$('input[value='+selected[i]+']').iCheck('check');
   	    	triggeredByChild = false;
   	    }
	}

	//Role Selcted
	if (typeof rolesSelected !== 'undefined') {
   	    $("#roles").val(rolesSelected).trigger("change");
	}

	$('.slimScroll').slimScroll({
	    color: '#00f',
	    size: '10px',
	    height: '300px',
	    alwaysVisible: true
	});

});