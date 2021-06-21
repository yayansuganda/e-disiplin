$('body').on('click', '.modal-show', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').removeClass('hide').text(me.hasClass('edit') ? 'Simpan' : 'Create');


    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body').html(response);
        }
    });

    $('#modal').modal('show');

});



$('#modal-btn-save').click(function (event) {
    event.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var form = $('#modal-body form'),
        url = form.attr('action'),
        method = $('input[name=_method]').val() == undefined ? 'POST' : 'POST';
        //method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';


    console.log(url);

    form.find('.help-block').remove();
    form.find('.form-group').removeClass('has-error');

    $.ajax({
        url: url,
        method: method,
        data:new FormData(form[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            form.trigger('reset');
            $('#modal').modal('hide');
            $('#data-table-responsive').DataTable().ajax.reload();
            $('.data').DataTable().ajax.reload();
            swal({
                type: 'success',
                title: 'Success',
                text: 'data berhasil di simpan'
            });
        },

        error: function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $('#' + key)
                        .closest('.form-group')
                        .addClass('has-error')
                        .append('<span class= "help-block"><strong>' + value + '</strong</span>')
                });
            }
        }
    });
});


$('body').on('click', '.btn-delete', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');

    swal({
        title: 'yakin mau hapus' + title + '?',
        text: 'you won\'t be able to revert this',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'yes'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': csrf_token
                },
                success: function (response) {
                    $('#data-table-responsive').DataTable().ajax.reload();
                    $('.data').DataTable().ajax.reload();


                    swal({
                        type: 'success',
                        title: 'Success',
                        text: 'Data Berhasil Di Hapus'
                    });
                },
                error: function (xhr) {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Terjadi Kesalahan Dalam Menghapus'
                    });
                }
            });
        }
    });

});


$('body').on('click', '.btn-show', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').addClass('hide');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body-3').html(response);
        }
    });

    $('#modal-view').modal('show');
});



$('body').on('click', '.btn-show-preview', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title-preview').text(title);

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body-preview').html(response);
        }
    });

    $('#modal-preview').modal('show');
});
