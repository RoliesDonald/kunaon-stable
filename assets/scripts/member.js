$(document).ready(function(){
	if(document.getElementById('TableMember')!=null){
	 	App.setDataTables('#TableMember','api/datatables/member');
	}
});


