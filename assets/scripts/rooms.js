$(document).ready(function(){

    if(document.getElementById('TableRoom')!=null){
      App.setDataTables('#TableRoom','api/datatables/room');
    }

    $('#add').click(function(){
          var remove = $('.delete').length;
          var i = parseInt(remove+=1);
          var html = "";
          html += "<div class='form-group' id='table"+i+"'>";
              html += "<label for='focusedinput' class='col-sm-2 control-label'></label>";
              html += '<div class="col-sm-10">';
              	 	html+= '<div class="input-group">';
              	 		html+= '<input type="text" class="form-control" placeholder="Number Of Table..." name="table[]" required>';
              	 		html+= '<a href="javascript:deleteRow('+i+');" id="delete" class="btn btn-default input-group-addon">';
              	 			html+= '<i class="fa fa-trash"></i>';
              	 		html+= '</a>';
              	 	html+= '</div>';
              html += '</div>';	 
          html += "</div>";
        $('#list').append(html);
     });

});

function deleteRow(i){
    $('#table'+i).remove();
}