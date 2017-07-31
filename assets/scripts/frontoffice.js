$(document).ready(function(){

	$(".select2").select2();


    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });



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

    $("[data-mask]").inputmask();
    if(document.getElementsByClassName('price')!=null){
        $('.price').maskMoney({prefix:'', thousands:'.', decimal:',', precision:0});
    } 

    if (document.getElementById('date') !=null) {
        $('#date').daterangepicker({
            format: 'DD/MM/YYYY',
            singleDatePicker: true,
            calender_style: "picker_2"
        });
     }

});


function ShowTime() {   
    var now_date = new Date();  
    setTimeout("GetDate()",1000);  
    var sec = now_date.getSeconds();
    var second;
    if(sec<10){
         second = "0"+sec;
    }else{
        second = sec;
     }
    var min = now_date.getMinutes();
    var mnt;
    if(min<10){
        mnt = "0"+min;
    }else{
        mnt = min;
    }
    var hrs = now_date.getHours();
    var h;
    if(hrs<10){
        h = "0"+hrs;
    }else{
        h = hrs;
    }
    if(document.getElementById("box-time")!=null){
       document.getElementById("box-time").innerHTML = GetDate()+" - "+h+":"+mnt+":"+second;
    }
   
}

function GetDate(){
    var date = new Date();
    var now_date = date.getDate();
    var day = date.getDay();
    var month = date.getMonth();
    var year = date.getFullYear();
  
    var day_arr = new Array();
    day_arr[0] = "Sunday";
    day_arr[1] = "Monday";
    day_arr[2] = "Tuesday";
    day_arr[3] = "Wednesday";
    day_arr[4] = "Thursday";
    day_arr[5] = "Friday";
    day_arr[6] = "Saturday";
           
    var month_arr = new Array();
    month_arr[0] = "January";
    month_arr[1] = "February";
    month_arr[2] = "March";
    month_arr[3] = "April";
    month_arr[4] = "May";
    month_arr[5] = "June";
    month_arr[6] = "July";
    month_arr[7] = "August";
    month_arr[8] = "September";
    month_arr[9] = "October";
    month_arr[10] = "November";
    month_arr[11] = "December";

    return day_arr[day]+" , "+now_date+" "+month_arr[month]+" "+year;
   
}
