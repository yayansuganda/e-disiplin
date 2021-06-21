$('body').on('click', '.modal-show-2', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

     $('#modal-title').text(title);
     $('#modal-btn-save-2').removeClass('hide').text(me.hasClass('edit') ? 'Update' : 'Create');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body-2').html(response);
        }
    });

    $('#modal2').modal('show');

});




$('#modal-btn-save-2').click(function (event) {
    event.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var form = $('#modal-body-2 form'),
        url = form.attr('action'),
        method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

    console.log(url);

    form.find('.help-block').remove();
    form.find('.form-group').removeClass('has-error');

    $.ajax({
        url: url,
        method: method,
        processData: false,
        contentType: false,
        data: new FormData(form[0]),
        success: function (response) {
            form.trigger('reset');
            $('#modal2').modal('hide');
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


$('body').on('click', '.btn-delete-2', function (event) {
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
