var Order = {
    
    LoadMenu :  function(val,cat,catname){
        $('#MenuList').empty();
        $('#MenuLoader').show();
        $.ajax({
            url : base_url+'api/menus/index?val='+(val||'')+'&cat='+(cat||''),
            type : 'GET',
            contentType : false,
            cache : false,
            processData : false,
            success: function (data, textStatus, jqXHR) {
                var CategoryName = catname||'';
                if(CategoryName==''){
                    $('#txt-category').text('Category');
                }else{
                    $('#txt-category').text('Category Of '+CategoryName);
                }
                setTimeout(function(){
                    $('#MenuLoader').hide(function(){
                        $('#MenuList').html(data);
                    });
                },1000); 
            }
        });
    },

    InputQty: function(id,val){
        var html = '<div class="input-group">';
        html += '<span class="input-group-btn">';
        html += '<button id="minus'+id+'" type="button" class="btn btn-warning btn-number btn-xs minus">';
        html += '<span class="glyphicon glyphicon-minus"></span>';
        html += '</button>';
        html += '</span>';
        if(val){
            html += '<input type="text" id="qty'+id+'" class="form-control qty input-xs" value="'+val+'" min="1">';
        }else{
            html += '<input type="text" id="qty'+id+'" class="form-control qty input-xs" value="1" min="1">';
        }
        html += '<span class="input-group-btn">';
        html += '<button id="plus'+id+'" type="button" class="btn btn-success btn-number btn-xs plus">';
        html += '<span class="glyphicon glyphicon-plus"></span>';
        html += '</button>';
        html += '</span>';
        html += '</div>';
        return html;
    },


    AddMenu : function(id,menu,qty,prc){
        var t = $('#TableBill').DataTable();
        var price = numeral(prc).format('0,0').replace(/,/g, '.');
        var row = new Array();
        var Qty = $('#TemplateNumber').html();
        row[0] = '<div id="menu_name' + id + '">' + menu + '</div>';
        row[1] = price+'<input type="hidden" id="price' + id + '" value="' + price + '" />';
        row[2] = Order.InputQty(id,qty);
        row[3] = '<div id="total' + id + '">0</div><input type="hidden" id="_total' + id + '"/>';
        row[4] = '<a class="btn btn-xs btn-danger remove"><i class="fa fa-trash"></i></a>';
        if (document.getElementById('menu_name' + id) == null) {
            t.row.add(row).draw().node();
            Order.Calculate();
        }
    },

    Calculate : function(){

        var _tax = $('#tax').val();
        var _disc = $('#discount').val();
        var subtotal = 0;
        var discount = 0.0;
        var grandtotal = 0;
        var items = 0;
        var Data = new Array();

        $('.qty').each(function (i) {
            var _id = $(this).attr('id');
            var id = _id.replace('qty', '');
            var _price = $('#price' + id).val();
            var price = parseFloat(_price.replace(/\./g, ''));
            var qty = $(this).val();
            var menu = $('#menu_name' + id).text();
            var total = parseInt(price * qty) || 0;
            $('#total' + id).text(numeral(total).format('0,0').replace(/,/g, '.'));
            $('#_total' + id).val(total);
            subtotal += parseInt(total);
            items += parseInt(qty);
            Data[i] = {
                "id": id,
                "menu": menu,
                "price": price,
                "qty": qty,
                "total": total
            };
        });

        var tax = parseFloat(subtotal * (parseFloat(_tax / 100)));

        if($('#member_id').val()!=""){
            discount = parseFloat(subtotal * (parseFloat(_disc / 100)));
        }

        grandtotal = parseFloat((subtotal + tax) - parseFloat(discount));
        

        var json = JSON.stringify(Data);
        $('#InputBill').val(json);

        $('#t_subtotal').html(numeral(subtotal).format('0,0').replace(/,/g, '.'));
        $('#t_tax').html(numeral(tax).format('0,0').replace(/,/g, '.'));
        $('#t_discount').html(numeral(discount).format('0,0').replace(/,/g, '.'));
        $('#t_grandtotal').html(numeral(grandtotal).format('0,0').replace(/,/g, '.'));

        $('#InputSubTotal').val(subtotal.toFixed(0));
        $('#InputTax').val(tax.toFixed(0));
        $('#InputDiscount').val(discount.toFixed(0));
        $('#InputGrandTotal').val(grandtotal.toFixed(0));
        
    },

    SelectTable :  function(){
       $('#ModalTable').modal().show();
    },

   
    AddTable : function(val){
        var InputTable = $('#InputTable').val();
        if(InputTable==""){
            $('#InputTable').val(val);
        }else{
            InputTable += ","+val;
            $('#InputTable').val(InputTable);
        }
        var tab = InputTable.split(","); 
        if(tab.length>0){
            $('#btnSelectTable').html(tab.length+' <strong>table was selected</strong>');
        }else{
            $('#btnSelectTable').html('<i class="fa fa-arrows"></i> Choose Table');
        }
        
    },

    RemoveTable : function(val){
        var InputTable = $('#InputTable').val();
        if(InputTable!=""){
            var tab = InputTable.split(","); 
            var i = tab.indexOf(val);
            if(i != -1) {
                tab.splice(i, 1);
            }
            $('#InputTable').val(tab.join());
            if(tab.length>0){
                $('#btnSelectTable').html(tab.length+' <strong>table was selected</strong>');
            }else{
                 $('#btnSelectTable').html('<i class="fa fa-arrows"></i> Choose Table');
            }
        }
    },

    SelectedTable :  function(val){
        if(val==true){
            $("#TableTab input").iCheck('check');
        }else{
            $("#TableTab input").iCheck('uncheck');
        }
    },

    SelectMember :  function(){
        $('#ModalMember').modal('show');
    },

    ResetMember :  function(){
        $('#member_id').val('');
        $('#btn-member').html('<i class="fa fa-user"></i> Choose Member');
        Order.Calculate();
    },

    ResetTable: function(){
        $('#InputTable').val('');
        $("#TableTab input").iCheck('uncheck');
        $('#btnSelectTable').html('<i class="fa fa-arrows"></i> Choose Table');
    },

    ChoseMember: function(id,name){
        $('#member_id').val(id);
        $('#btn-member').html('<i class="fa fa-user"></i> '+name);
        $('#ModalMember').modal('hide');
        Order.Calculate();
    }


};


$(document).ready(function(){

    window.setTimeout("ShowTime()",1000);  

	$('#TableBill').DataTable({
        scrollY: '26vh',
        scrollCollapse: true,
        paging: false,
        bFilter: false,
        bInfo: false,
        bPaginate: false,
        bSort: false,
        "columns": [
            null,
            null,
            null,
            null,
            {"width": "21.5%"},
        ]
    });

     $('#TableTab').DataTable({
          "pageLength": 8,
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": false,
    });

    
    $(".col-lg-6 .dataTables_scrollBody,#MenuList").niceScroll({cursorcolor: "#E74C3C"});

    if(document.getElementById('TableMember')!=null){

        $("#TableMember").dataTable({
               responsive: true,
              "pageLength": 8,
              'sPaginationType': 'simple',
              'bServerSide': true,
              'bProcessing': true,
              'sAjaxSource': base_url+'api/datatables/member',
              "bLengthChange": false,
              "bFilter": true,
              "bSort": true,
              "bInfo": false,
              "bAutoWidth": true,
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
                 var _id = data[2];
                 var id = parseInt(_id.substr(5));
                 $('td:eq(2)',row).html('<a OnClick="Order.ChoseMember('+id+',\'' + data[3] + '\')" class="btn btn-xs btn-primary" href="javascript:void(0);"><i class="fa fa-edit"></i> Selected</a>');
              }         
        });
        var table = $('#TableMember').DataTable();
        table.columns([0,1,4,5,6,7]).visible(false);

     }


    $('#text-search').on('keyup change', function (e) {
        var val = $(this).val();
        Order.LoadMenu(val,'','');
    });

    $('#FormSearch').submit(function(){
        var val = $(this).val();
        Order.LoadMenu(val,'','');
        return false;
    });

    $('#DoPaid').click(function(){
        $('#ModalPayment').modal('show');
    });

    var t = $('#TableBill').DataTable();

    t.on('click', '.remove', function () {
        t.row($(this).parents('tr')).remove().draw();
        Order.Calculate();
    });
  	
    t.on('click', '.plus', function () {
        var _id = $(this).attr('id');
        var id = parseInt(_id.replace('plus', ''));
        var qty = parseInt($('#qty' + id).val());
        $('#qty' + id).val(qty += 1);
        Order.Calculate();
    });

    t.on('click', '.minus', function () {
        var _id = $(this).attr('id');
        var id = parseInt(_id.replace('minus', ''));
        var qty = parseInt($('#qty' + id).val());
        if (qty > 1) {
            $('#qty' + id).val(qty -= 1);
            Order.Calculate();
        }
    });


    t.on('keyup change', '.qty', function () {
        var val = $(this).val();
        var data = parseInt(val);
        if (typeof data === 'number' && (data % 1) === 0) {
            Order.Calculate();
        } else {
            $(this).val(0);
            Order.Calculate();
        }
    });

    var tableTab = $('#TableTab').DataTable();

    tableTab.on('ifChecked', function(event){
        var val = event.target.value;
        Order.AddTable(val);
    });

    tableTab.on('ifUnchecked', function(event){
        var val = event.target.value;
        Order.RemoveTable(val);
        if(typeof tableorder !== 'undefined'){
           if(tableorder){
              $.ajax({ url : base_url+'api/menus/reset_table/'+transaction_number+'/'+val,success: function(data){ console.log(data); } });
           }
        }
    });

   
    Order.LoadMenu();

    if(document.getElementById('TableListOrder')!=null){
        App.setDataTables('#TableListOrder','api/datatables/order');
    }

    if(typeof listmenu !== 'undefined'){
        if(listmenu){
            var json = JSON.parse(listmenu);
            for(i=0;i<json.length;i++){
               Order.AddMenu(json[i].id,json[i].menu,json[i].qty,json[i].price);
            }
        }
    }

    if(typeof member !== 'undefined'){
        if(member.id && member.name){
            Order.ChoseMember(member.id,member.name);
        }
    }

    if(typeof tableorder !== 'undefined'){
        if(tableorder){
            var trow = tableorder.split(",");
            for(i=0;i<trow.length;i++){
                Order.AddTable(trow[i]);
            }
        }
    }

    if(document.getElementById("DetailTransaction")!=null){
        $('select').select2();
        $('.grandtotal_view').val(numeral($('.grandtotal').val()).format('0,0').replace(/,/g,'.'));
        $('#change_view').val(numeral($('#change').val()).format('0,0').replace(/,/g,'.'));
        $('.price').maskMoney({prefix:'', thousands:'.', decimal:',', precision:0});
        $("[data-mask]").inputmask();
        $(".credit_number").inputmask('(999) 999-9999');
        App.GetSelect2('#bank_id','api/SelectTwo/bank','Search Bank..');
        App.GetSelect2('#bank_id2','api/SelectTwo/bank','Search Bank..');
        App.GetSelect2('#creditcard_id','api/SelectTwo/creditcard','Search Credit Card..');
    }


    $('#cash #cash_view').on('keyup change', function (e) {
        var _cash = $(this).val();
        var _grandtotal = $('#cash #grandtotal').val();
        var cash = parseFloat(_cash.replace(/\./g, ''));
        var grandtotal = parseFloat(_grandtotal.replace(/\./g, ''));
        if (cash <= grandtotal) {
            $('#change').val(0);
            $('#change_view').val(numeral(0).format('0,0').replace(/,/g, '.'));
        } else {
            $('#change').val(cash - grandtotal);
            $('#change_view').val(numeral(cash - grandtotal).format('0,0').replace(/,/g, '.'));
        }
    });

    if(document.getElementById("TableCurrentOrder")!=null){

      var t = $('#TableCurrentOrder').dataTable();
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
           window.location.href = url;
        });

    }

   
   
});

