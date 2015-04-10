$(function(){

    // Events
    $('#btn-new').on('click',showCreate);
    $('.detail').on('click',showDetail);

    window.table = App.initDT('.table');
    $('[data-toggle="tooltip"], .enable-tooltip').tooltip({container: 'body', animation: false});



    // Functions
    function showCreate(e) {
        Helper.blockPage();

        $('#div-modal').load('admin/guidelines/create', function() {
            Helper.unblockPage();
            window.table_procedures = App.initDT('#modal-create .table');
            $('#modal-create').modal({show:true});
            $('#btn-save').on('click',function(e) {
                var form = $('#form-create');
                if($(form).valid()){
                    $('#btn-save').prop('disabled',true);
                    Helper.blockDiv('#modal-create  .modal-content');
                    var data = {
                            'procedures': makeData(),
                            'id_town': form.find("[name='idtown']").val(),
                            'id_guide' : form.find("[name='idguide']").val(),
                            'description' : form.find("[name='description']").val(),
                            '_token' : form.find("[name='_token']").val()
                        };

                    console.log(data);
                    $.ajax({
                        url: form.prop('action'),
                        data: data,
                        type: form.prop('method'),
                        success: function(response){
                            if(response) {
                                Helper.unblockDiv('#modal-create  .modal-content');
                                console.log(response);
                                var alert = form.parent().parent().find('.alert');
                                if(response.success){
                                    alert.removeClass('alert-danger').addClass('alert-success');
                                }else{
                                    alert.html(response.message);
                                    alert.removeClass('alert-success').addClass('alert-danger');
                                }
                                alert.html(response.message);
                                alert.fadeIn();

                                setTimeout(function(){
                                    $(window.$contenedor).load('admin/guidelines',function(){
                                        $('#modal-create').modal('hide');
                                        $('.modal-backdrop').remove();
                                    });
                                },2000);
                            }
                        }
                    });
                }
                e.preventDefault();
            })

        })

        return e.preventDefault();
    }

    function showDetail(e) {
        e.preventDefault();
        var el  = $(this);
        var id  = el.data('id');

        Helper.blockPage();
        $('#div-modal').load('admin/guidelines/' + id, function(){
            Helper.unblockPage();
            $('#modal-detail').modal({show:true});
        });
    }

    function makeData() {
        var rows = window.table_procedures.data.fnGetNodes();
        var data = [];

        var is_enabled, url, id_procedure, row;
        $.each(rows, function(key, value) {
            row = $(value);
            is_enabled = row.find('.is_enabled').prop('checked');
            id_procedure = row.find('.id').val();
            url = row.find('.url').val();

            data.push({'id_procedure': id_procedure, 'is_enabled': is_enabled, 'url': url});
        });

        return data;
    }

});