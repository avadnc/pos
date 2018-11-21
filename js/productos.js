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
                    if (data['imagen'] == '' || data['imagen'] == null) {
                        return '<img src="img/productos/producto.png" style="width:40px;">';
                    } else {
                        return '<img src="' + data['imagen'] + '" style="width:40px;">';
                    }
                }
            },
            {
                "data": function(data) {

                    // =========================================================
                    // pendiente de revisar para mandar variables de stock
                    // =========================================================

                    return "<button class='btn btn-success'>" + data['stock'] + "</button>";

                }
            },
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
        }

    });
});

$(document).on('click', '.btnEditarProducto', function() {

    idProducto = $(this).attr('idProducto');

    console.log('clicaste el Id ' + idProducto);
});