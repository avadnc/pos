// =============================================================================
// Subiendo foto Usuario
// =============================================================================

$('.nuevaFoto').change(function() {

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