$('.tambahFormModal').on('click', function () {
    $('#formModalLabel').text('Tambah Data User');
    $('#btnFormModal').text('Tambah Data');

    $('#id').val("");
    $('#nama').val("");
    $('#umur').val("");
    $('#email').val("");
});
$('.ubahFormModal').on('click', function () {
    $('#formModalLabel').text('Ubah Data User');
    $('#btnFormModal').text('Ubah Data');

    $('#formModal form').attr('action', 'http://localhost/phpmvc/MVC/public/user/ubah');

    let id = $(this).data('id');

    $.ajax({
        url: 'http://localhost/phpmvc/MVC/public/user/getUbah',
        method: 'post',
        data: { id: id },
        dataType: 'json',
        success: function (data) {
            $('#id').val(data.id);
            $('#nama').val(data.nama);
            $('#umur').val(parseInt(data.umur));
            $('#email').val(data.email);
        }
    });
});