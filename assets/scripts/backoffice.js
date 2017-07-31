$(document).ready(function(){

    App.SidebarActive(current_active);

	  $('.ajax').click(function(){
        $.ajax({url: '#', success: function(result){
            $('.ajax-content').html('<hr>Ajax Request Completed !');
        }});
    });

    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

	  $(".select2").select2();

	  
    $('.delete').click(function(){
        var url = $(this).attr('href');
         swal({
            title: "Are you sure to delete this ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete this !",
            cancelButtonText: "Cancel",
            closeOnConfirm: false
          },
          function(){
             window.location.href = url;
          });
        return false;
    });

    $('.clockpicker').clockpicker({
      placement: 'top',
      align: 'left',
      donetext: 'Selesai'
    });

      $("[data-mask]").inputmask();
      if(document.getElementsByClassName('price')!=null){
          $('.price').maskMoney({prefix:'', thousands:'.', decimal:',', precision:0});
      } 

    
});