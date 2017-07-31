$(document).ready(function(){
    App.GetSelect2('#app_timezone','api/selecttwo/timezone','Search Time Zone..');
    App.GetSelect2('#app_currency','api/selecttwo/currency','Cari mata uang..');
    App.GetSelect2('#app_printer','api/selecttwo/printer','Cari jenis printer..');
    App.GetSelect2('#app_dateformat','api/selecttwo/dateformat','Cari format tanggal..');
});