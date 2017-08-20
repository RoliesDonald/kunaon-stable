$(document).ready(function(){
    App.GetSelect2('#country_id','api/SelectTwo/countries','Select Country');
    if(document.getElementById('TableBank')!=null){
	 	App.setDataTables('#TableBank','api/datatables/bank');
	}
});