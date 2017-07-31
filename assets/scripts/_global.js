var App = {

    GetSelect2: function(selector,link,text){
      $(selector).select2({        
        ajax: {
          placeholder: text,
          url: base_url+""+link,
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
              q: params.term 
            };
          },
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        },
        
      });
    },


    SidebarActive: function(url){
      $('ul.sidebar-menu a[href="' + base_url+''+url + '"]').parent().addClass('active');
      $('ul.sidebar-menu a').filter(function () {
          return this.href == base_url+''+url;
      }).parent().addClass('active').parent().parent().addClass('active');
    },

    

    setDataTables: function(selector,api,sort){
      
      $(selector).dataTable({
           responsive: true,
          'sPaginationType': 'full_numbers',
          'bServerSide': true,
          'bProcessing': true,
          'sAjaxSource': base_url+''+api,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": (sort==false) ? false : true,
          "bInfo": true,
          "bAutoWidth": true,
          "showNEntries" : true,
          'fnServerData': function (sSource, aoData, fnCallback){
               $.ajax({
                  'dataType': 'json',
                  'type': 'POST',
                  'url': sSource,
                  'data': aoData,
                  'success': fnCallback
              });
          },
          "fnRowCallback": function (row, data, dataIndex){
              $(row).find('input[type="checkbox"]').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
              });
          }         
      });

      

      var t = $(selector).dataTable();
      t.on('click', '.delete', function () {
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

        t.on('ifChecked', function(event){
            var val = event.target.value;
            App.addDeleted(val);
        });

        t.on('ifUnchecked', function(event){
            var val = event.target.value;
            App.removeDeleted(val);
        });

        t.on('click','tbody tr',function(){
           var url =  $(this).find('.btn-details').attr('href');
           if(url){
              window.location.href = url;
           }
        });

        var buttons = new $.fn.dataTable.Buttons(t, {
           buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i> Copy',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i> Excel',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i> CSV',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i> PDF',
                titleAttr: 'PDF'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> Print',
                titleAttr: 'Print'
            },
            {
                extend:    'colvis',
                text:      '<i class="fa fa-table"></i> Column Visibility',
                titleAttr: 'Colvis'
            }
          ]
      }).container().appendTo($('#button-tools')); 


    },

    setDateFilterTable: function(selector){
       $(selector+'_filter input').css({'width':'150px'});
       $(selector+'_filter input').daterangepicker({
            format: 'DD/MM/YYYY',
            calender_style: "picker_2"
        });
        $(selector+'_filter input').change(function(){
           $(this).trigger('keyup');
        });
    },


    addDeleted: function(val){
      var InputDeleted = $('#dataDeleted').val();
      if(InputDeleted==""){
          $('#dataDeleted').val(val);
      }else{
          InputDeleted += ","+val;
          $('#dataDeleted').val(InputDeleted);
      }
    },

    removeDeleted: function(val){
        var InputDeleted = $('#dataDeleted').val();
        if(InputDeleted!=""){
            var tab = InputDeleted.split(","); 
            var i = tab.indexOf(val);
            if(i != -1) {
                tab.splice(i, 1);
            }
            $('#dataDeleted').val(tab.join());
        }
    },

};


$(document).ready(function(){


   $('.btn-delete-all').click(function(){
        var url = $(this).attr('href');
        var InputDeleted = $('#dataDeleted').val();
        if(InputDeleted!=""){
            swal({
                title: "Are you sure to delete selected data  ?",
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
        }
        return false;
    });

    $('.check-all').on('ifChecked', function(event){
        $('input[type="checkbox"]').iCheck('check');
        var val = event.target.value;
        triggeredByChild = false;
    });

    $('.check-all').on('ifUnchecked', function (event) {
        if (!triggeredByChild) {
            $('input[type="checkbox"]').iCheck('uncheck');
        }
        var val = event.target.value;
        triggeredByChild = false;
    });

    $('.select2').select2();

});