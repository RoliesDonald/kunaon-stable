$(document).ready(function(){
    App.GetSelect2('#app_timezone','api/SelectTwo/timezone','Search Time Zone..');
    App.GetSelect2('#app_currency','api/SelectTwo/currency','Cari mata uang..');
    App.GetSelect2('#app_printer','api/SelectTwo/printer','Cari jenis printer..');
    App.GetSelect2('#app_dateformat','api/SelectTwo/dateformat','Cari format tanggal..');
});