$(document).ready(function(){
    
    if(document.getElementById('TableReportPeriod')!=null){
	 	App.setDataTables('#TableReportPeriod','api/datatables/report/period');
	 	App.setDateFilterTable('#TableReportPeriod');
	}

	if(document.getElementById('TableReportMenu')!=null){
	 	App.setDataTables('#TableReportMenu','api/datatables/report/menu');
	 	App.setDateFilterTable('#TableReportMenu');
	}

	if(document.getElementById('TableReportCasheir')!=null){
	 	App.setDataTables('#TableReportCasheir','api/datatables/report/casheir');
	 	App.setDateFilterTable('#TableReportCasheir');
	}

	if(document.getElementById('TableReportPayment')!=null){
	 	App.setDataTables('#TableReportPayment','api/datatables/report/payment');
	 	App.setDateFilterTable('#TableReportPayment');
	}

	if(document.getElementById('TableReportBranch')!=null){
	 	App.setDataTables('#TableReportBranch','api/datatables/report/branch');
	 	App.setDateFilterTable('#TableReportBranch');
	}

});