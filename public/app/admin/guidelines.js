$(function(){

    // Events
    $('#btn-new').on('click',showCreate);
    $('.detail').on('click',showDetail);
    $('.edit').on('click',showEdit);

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
                            'id_town': form.find("[name='id_town']").val(),
                            'id_guide' : form.find("[name='id_guide']").val(),
                            'description' : form.find("[name='description']").val(),
                            '_token' : form.find("[name='_token']").val()
                        };

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

    function showEdit(e) {
        Helper.blockPage();
        var el = $(this);
        var id = el.data('id');

        $('#div-modal').load('admin/guidelines/edit/' + id, function() {
            Helper.unblockPage();
            window.table_procedures = App.initDT('#modal-edit .table');
            $('#modal-edit').modal({show:true});
            $('#btn-edit').on('click',function(e) {
                var form = $('#form-edit');
                if($(form).valid()) {
                    $('#btn-save').prop('disabled', true);
                    Helper.blockDiv('#modal-edit  .modal-content');
                    var data = {
                        'procedures': makeData("edit"),
                        'id_town': form.find("[name='id_town']").val(),
                        'id_guide': form.find("[name='id_guide']").val(),
                        'description': form.find("[name='description']").val(),
                        '_token': form.find("[name='_token']").val()
                    };

                    $.ajax({
                        url: form.prop('action'),
                        data: data,
                        type: form.prop('method'),
                        success: function (response) {
                            console.log(response);
                            if (response) {
                                Helper.unblockDiv('#modal-edit  .modal-content');

                                var alert = form.parent().parent().find('.alert');
                                if (response.success) {
                                    alert.removeClass('alert-danger').addClass('alert-success');
                                } else {
                                    alert.html(response.message);
                                    alert.removeClass('alert-success').addClass('alert-danger');
                                }
                                alert.html(response.message);
                                alert.fadeIn();

                                setTimeout(function () {
                                    $(window.$contenedor).load('admin/guidelines', function () {
                                        $('#modal-edit').modal('hide');
                                        $('.modal-backdrop').remove();
                                    });
                                }, 2000);
                            }
                        }
                    });
                }

                e.preventDefault();
            });
        });

        e.preventDefault();
    }

    function makeData(option) {
        option = option || "create";
        var rows = window.table_procedures.data.fnGetNodes();
        var data = [];

        var is_enabled, url, id_procedure, row, id_detail;
        $.each(rows, function(key, value) {

            row = $(value);
            is_enabled = row.find('.is_enabled').prop('checked');
            id_procedure = row.find('.id').val();
            url = row.find('.link').val();

            if(option == "edit")
            {
                id_detail = row.find('.id_detail').val();
                data.push({'id_procedure': id_procedure, 'is_enabled': is_enabled, 'url': url, 'id_detail': id_detail});
            }
            else
            {
                data.push({'id_procedure': id_procedure, 'is_enabled': is_enabled, 'url': url});
            }
        });

        return data;
    }

});