// =============================================================================
// Subiendo foto Usuario
// =============================================================================

$(document).on('change', '.nuevaFoto', function() {

    var imagen = this.files[0];

    console.log(imagen);
    // =========================================================================
    // Validar imagen sea jpg o png
    // =========================================================================

    if (imagen['type'] != 'image/jpeg' && imagen['type'] != 'image/png') {

        $('.nuevaFoto').val('');

        swal({

            title: 'Error al subir la imagen',
            text: 'La imagen debe ser JPG o PNG',
            type: 'error',
            width: '600px',
            height: '600px',
            confirmButtonText: 'Cerrar'

        });

    } else if (imagen['size'] >= 200000) {

        swal({

            title: 'Error al subir la imagen',
            text: 'La imagen no puede ser superior a 200Kb',
            type: 'error',
            width: '600px',
            height: '600px',
            confirmButtonText: 'Cerrar'

        });

    } else {

        var datosImagen = new FileReader;

        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on('load', function(event) {

            var rutaImagen = event.target.result;

            $('.previsualizar').attr('src', rutaImagen);
        });

    }
});

// =============================================================================
// Editar Usuario
// =============================================================================
$(document).on('click', '.btnEditarUsuario', function() {

    var idUsuario = $(this).attr('idUsuario');

    var datos = new FormData();
    datos.append('idUsuario', idUsuario);

    $.ajax({
        url: 'ajax/usuarios.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {


            $('#nombre').val(respuesta['nombre']);
            $('#usuario').val(respuesta['usuario']);
            $('#perfil').html(respuesta['perfil']);
            $('#perfil').val(respuesta['perfil']);
            $('#fotoActual').val(respuesta['foto'])
            $('#passwordActual').val(respuesta['password']);
            if (respuesta['foto'] != "") {

                $('#foto').attr('src', respuesta['foto']);
            } else {
                $('#foto').attr('src', 'img/usuarios/anonimo.jpg');
            }

            ;
            console.log('respuesta es', respuesta);
        }
    });
});

// =============================================================================
// Verificar si existe Usuario
// =============================================================================


$('#nuevoUsuario').change(function() {

    var usuario = $(this).val();
    $('.label').remove();
    var datos = new FormData();
    datos.append('validarUsuario', usuario);
    $.ajax({
        url: 'ajax/usuarios.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {
            if (respuesta) {
                $('#nuevoUsuario').parent().before('<h2><label class="label label-warning">El usuario ' + usuario + ' ya existe</label></h2>');
                $('#nuevoUsuario').val('');
            }
        }
    });
});


// =============================================================================
// Eliminar Usuar
// =============================================================================

$(document).on('click', '.btnEliminarUsuario', function() {

    idUsuario = $(this).attr('idUsuario');
    fotoUsuario = $(this).attr('fotoUsuario');
    usuario = $(this).attr('usuario');
    usuarioActual = $(this).attr('usuarioActual');

    if (idUsuario == usuarioActual) {

        console.log('no puedes eliminarte a ti mismo');

    } else {

        swal({
            title: 'Estas a punto de borrar usuario',
            text: 'Si no lo desea puede cancelar',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Eliminar',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar'

        }).then((result) => {
            if (result.value) {

                window.location = 'index.php?ruta=usuarios&idUsuario=' + idUsuario + '&usuario=' + usuario + '&fotoUsuario=' + fotoUsuario;

            }
        });
    }
});
// =============================================================================
// Activar Usuario
// =============================================================================
$(document).on('click', '.btnActivar', function() {

    var idUsuario = $(this).attr('idUsuario');
    var estadoUsuario = $(this).attr('estadoUsuario');
    var usuarioActual = $(this).attr('usuarioActual');

    // console.log(idUsuario, estadoUsuario);
    if (idUsuario == usuarioActual) {

        console.log('no puedes desactivarte a ti mismo');

    } else {

        var datos = new FormData();
        datos.append('activarId', idUsuario);
        datos.append('activarUsuario', estadoUsuario);

        $.ajax({
            url: 'ajax/usuarios.ajax.php',
            method: 'POST',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(respuesta) {

                console.log('correcto');

                if (window.matchMedia('(max-width:767px)').matches) {
                    swal({

                        title: 'Correcto',
                        text: 'El usuario ha sido actualizado',
                        type: 'success',
                        width: '600px',
                        confirmButtonText: 'Cerrar'

                    });
                }
            },
            error: function(err) {
                console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
            }
        });

        if (estadoUsuario == 0) {

            $(this).removeClass('btn-success');
            $(this).addClass('btn-danger');
            $(this).html('Desactivado');
            $(this).attr('estadoUsuario', 1);

        } else {

            $(this).removeClass('btn-danger');
            $(this).addClass('btn-success');
            $(this).html('Activado');
            $(this).attr('estadoUsuario', 0);
        }

    }
});