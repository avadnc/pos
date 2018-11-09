// =============================================================================
// Sidebar Menu
// =============================================================================
$('.sidebar-menu').tree();

// =============================================================================
// Recargar página cuando cambie de tamaño
// =============================================================================
$(window).on('resize', function() {
    location.reload();
});

// =============================================================================
// Data Table
// =============================================================================

$('.tablas').DataTable({
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