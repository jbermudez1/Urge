$(function(){

    window.table = App.initDT('.table');
    $('[data-toggle="tooltip"], .enable-tooltip').tooltip({container: 'body', animation: false});

    // Events
    $('.detail').on('click',showDetail);

    // Functions
    function showDetail(e) {
        var el  = $(this);
        var id  = el.data('id');

        Helper.blockPage();
        $('#div-modal').load('admin/guidelines/' + id,function(){
            Helper.unblockPage();
            $('#modal-detail').modal({show:true});
        });

        e.preventDefault()
    }

});