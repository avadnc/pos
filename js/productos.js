// =============================================================================
// Carga de Productos en Datatable
// =============================================================================

$(document).ready(function() {


    $('.tablaProductos').DataTable({
        "ajax": "ajax/datatable-productos.ajax.php",
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "columns": [
            { "data": "id" },
            { "data": "categoria" },
            { "data": "codigo" },
            { "data": "descripcion" },
            {
                "data": function(data) {
                    if (data.imagen == '' || data.imagen == null) {
                        return '<img src="img/productos/producto.png" style="width:40px;">';
                    } else {
                        return '<img src="' + data.imagen + '" style="width:40px;">';
                    }
                }
            },
            { "data": "stock" },
            { "data": "precio_compra" },
            { "data": "precio_venta" },
            { "data": "moneda" },
            { "data": "marca" },
            { "data": "ventas" },
            { "data": "fecha" },
            { "data": "claveprodserv" },
            { "data": "umed" },
            {
                sortable: false,
                "render": function(data, type, full, meta) {
                    // console.log(full);
                    var buttonID = full.id;
                    var codigo = full.codigo;
                    var imagen = full.imagen;
                    return "<div class='btn-group'><button idProducto='" + buttonID + "' class='btn btn-warning btnEditarProducto' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button idProducto='" + buttonID + "' codigo='" + codigo + "' imagen='" + imagen + "' class='btn btn-danger btnEliminarProducto'><i class='fa fa-times'></i></button></div>";
                }
            }
        ],
        "order": [
            [0, 'asc']
        ],
        'language': {

            'sProcessing': 'Procesando',
            'sLengthMenu': 'Mostrar _MENU_ registros',
            'zeroRecords': 'No se encontraron registros',
            'sEmptyTable': 'Ningún dato disponible en esta tabla',
            'sInfo': 'Mostrando registros del _START_ al _END_ de un total de _TOTAL_',
            'sInfoEmpty': 'Mostrando registros del 0 al 0 de un total de 0',
            'sInfoFiltered': '(filtrado un total de _MAX_ registros)',
            'sInfoPostFix': '',
            'sSearch': 'Buscar:',
            'sUrl': '',
            'sInfoThousands': ',',
            'sLoadingRecords': 'Cargando...',
            'oPaginate': {
                'sFirst': 'Primero',
                'sLast': 'Último',
                'sNext': 'Siguiente',
                'sPrevious': 'Anterior'
            },
            'oAria': {
                'sSortAscending': ': Activar para odernar la columna de manera ascendente',
                'sSortDescending': 'Activar para ordenar la columna de manera descendente'
            }
        },
        'rowCallback': function(row, data, index) {

            if (data.stock >= 20) {
                $(row).find('td:eq(5)').css('background-color', 'green');
                $(row).find('td:eq(5)').css('color', 'white');
                $(row).find('td:eq(5)').css('font-weight', 'bold');
            } else {
                $(row).find('td:eq(5)').css('background-color', 'red');
                $(row).find('td:eq(5)').css('color', 'white');
                $(row).find('td:eq(5)').css('font-weight', 'bold');

            }
        }

    });
});

// =============================================================================
// Verificar si el codigo existe
// =============================================================================

$(document).on('input', '#nuevoCodigo', function() {

    var codigo = $(this).val();
    $('.label').remove();
    var datos = new FormData();
    datos.append('codigoProducto', codigo);
    $.ajax({
        url: 'ajax/productos.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {
            if (respuesta) {
                $('#nuevoCodigo').parent().before('<h2><label class="label label-warning">El Código ' + codigo + ' ya existe</label></h2>');
                $('#nuevoCodigo').val('');
            }
        }
    });
});


// =============================================================================
// Capturar Categoria Codigo
// =============================================================================

// $(document).on('change', '#nuevaCategoria', function() {

//     var idCategoria = $(this).val();
//     var datos = new FormData();

//     datos.append('idCategoria', idCategoria);
//     $.ajax({
//         url: "ajax/productos.ajax.php",
//         method: "POST",
//         data: datos,
//         cache: false,
//         contentType: false,
//         processData: false,
//         dataType: 'json',
//         success: function(respuesta) {

//             var nuevoCodigo = respuesta.codigo;
//             console.log(nuevoCodigo);
//         }
//     });
// });

// =============================================================================
// Agregar precio de Venta
// =============================================================================
$(document).on('change', '#nuevoPrecioCompra', function() {

    if ($('.porcentaje').prop('checked')) {
        var valorProcentaje = $('.nuevoPorcentaje').val();

        var porcentaje = Number(($('#nuevoPrecioCompra').val() * valorProcentaje / 100)) + Number($('#nuevoPrecioCompra').val());

        $('#nuevoPrecioVenta').val(porcentaje);
        $('#nuevoPrecioVenta').prop('readonly', true);

    }
});

// =============================================================================
// Cambio de porcentaje
// =============================================================================

$(document).on('change', '.nuevoPorcentaje', function() {

    if ($('.porcentaje').prop('checked')) {
        var valorProcentaje = $('.nuevoPorcentaje').val();

        var porcentaje = Number(($('#nuevoPrecioCompra').val() * valorProcentaje / 100)) + Number($('#nuevoPrecioCompra').val());

        $('#nuevoPrecioVenta').val(porcentaje);
        $('#nuevoPrecioVenta').prop('readonly', true);

    }
});

$(document).on('ifUnchecked', '.porcentaje', function() {

    $('#nuevoPrecioVenta').prop('readonly', false);

});

$(document).on('ifChecked', '.porcentaje', function() {

    $('#nuevoPrecioVenta').prop('readonly', true);

});

// =============================================================================
// subir foto del producto
// =============================================================================

$(document).on('change', '.nuevaImagen', function() {

    var imagen = this.files[0];

    console.log(imagen);
    // =========================================================================
    // Validar imagen sea jpg o png
    // =========================================================================

    if (imagen['type'] != 'image/jpeg' && imagen['type'] != 'image/png') {

        $('.nuevaImagen').val('');

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
// editar producto
// =============================================================================

$(document).on('click', '.btnEditarProducto', function() {

    idProducto = $(this).attr('idProducto');

    var datos = new FormData();
    datos.append('idProducto', idProducto);
    $.ajax({
        url: 'ajax/productos.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {

            $('#editarCategoria').val(respuesta.id_categoria);
            $('#editarCategoria').html(respuesta.categoria);
            $('#editarCodigo').val(respuesta.codigo);
            $('#editarDescripcion').val(respuesta.descripcion);
            $('#editarCodigo').val(respuesta.codigo);
            $('#editarDescripcion').val(respuesta.descripcion);
            $('#editarStock').val(respuesta.stock);
            $('#editarPrecioCompra').val(respuesta.precio_compra);
            $('#editarPrecioVenta').val(respuesta.precio_venta);
            $('#editarClaveProdServ').val(respuesta.claveprodserv);
            $('#editarUmed').val(respuesta.umed);
            $('#editarMoneda').val(respuesta.moneda);

            if (respuesta.imagen != '') {
                $('#imagenActual').val(respuesta.imagen);
                $('.previsualizar').attr('src', respuesta.imagen);
            }
        }
    });
});