$(document).ready(function(){

	if(document.getElementById('TableFront')!=null){
	 	App.setDataTables('#TableFront','api/datatables/menu');
	 	var TFront = $('#TableFront').DataTable();
		TFront.columns([0,6]).visible(false);
	}

	if(document.getElementById('TableMenuCategory')!=null){
	 	App.setDataTables('#TableMenuCategory','api/datatables/menu/category');
	}

	if(document.getElementById('TableBack')!=null){
	 	App.setDataTables('#TableBack','api/datatables/menu');
	}

    App.GetSelect2('#category_id','api/selecttwo/menu_category','Search By Category..');
   
    if(document.getElementById("price_view")!=null){

       $('#price_view').val(numeral($('#price').val()).format('0,0').replace(/,/g,'.'));

       $('#price_view').on('propertychange change keyup paste input', function() {
         	var _price = $(this).val();
            var price = parseFloat(_price.replace(/\./g, ''));
            $('#price').val(price);
        });
    }
   

});