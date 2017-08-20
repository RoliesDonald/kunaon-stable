$(document).ready(function(){
    App.GetSelect2('#country_id','api/SelectTwo/countries','Search Country..');
    if(document.getElementById('TableBranch')!=null){
	 	App.setDataTables('#TableBranch','api/datatables/branch');
	}
});