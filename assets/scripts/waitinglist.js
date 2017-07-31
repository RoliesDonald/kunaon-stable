$(document).ready(function(){
	if(document.getElementById('TableWaitingList')!=null){
	 	App.setDataTables('#TableWaitingList','api/datatables/waitinglist');
	}
});


