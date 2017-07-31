$(document).ready(function(){

	 App.GetSelect2('#target_by','api/selecttwo/user','Select User');

	 if(document.getElementById('TableMessages')!=null){
	 	App.setDataTables('#TableMessages','api/datatables/messages',false);
	 }

	 $('#btn-inbox').click(function(){
	 	$('.btn-delete-all').text('Move To Trash');
	 	$('#deleted').val('');
	 	$('#TableMessages').DataTable().clear().destroy();
	 	 App.setDataTables('#TableMessages','api/datatables/messages?type=read');	
	 });

	 $('#btn-sent').click(function(){
	 	$('.btn-delete-all').text('Move To Trash');
	 	$('#deleted').val('');
	 	$('#TableMessages').DataTable().clear().destroy();
	 	App.setDataTables('#TableMessages','api/datatables/messages?type=sent');
	 });

	 $('#btn-draft').click(function(){
	 	$('.btn-delete-all').text('Move To Trash');
	 	$('#deleted').val('');
	 	$('#TableMessages').DataTable().clear().destroy();
	 	 App.setDataTables('#TableMessages','api/datatables/messages?type=is_draft');
	 });

	 $('#btn-trash').click(function(){
	 	$('.btn-delete-all').text('Delete Messages');
	 	$('#deleted').val('true');
	 	$('#TableMessages').DataTable().clear().destroy();
	 	 App.setDataTables('#TableMessages','api/datatables/messages?type=is_deleted');
	 });

});