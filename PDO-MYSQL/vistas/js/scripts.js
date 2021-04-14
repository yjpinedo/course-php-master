$('#correo').change(function () {
    $('.alert').remove();
    let correo = $(this).val();
    let datos = new FormData();
    datos.append('validarCorreo', correo);
    $.ajax({
        url: 'ajax/formulario.ajax.php',
        method: 'POST',
        data: datos,
        caches: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (respuesta) {
            if (respuesta) {
                $('#correo').val('');
                $('#correo').parent().after(function () {
                    return '<div class="alert alert-warning"><strong>El correo ya existe en la base de datos, por favor ingreso otro!</strong></div>'
                });
            }
        }
    });
});