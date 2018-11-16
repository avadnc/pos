// =============================================================================
// Editar Categoria
// =============================================================================
$(document).on('click', '.btnEditarCategoria', function() {


    var idCategoria = $(this).attr('idCategoria');
    var datos = new FormData();

    datos.append('idCategoria', idCategoria);

    $.ajax({
        url: 'ajax/categorias.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {

            $('#categoria').val(respuesta['categoria']);
            $('#idCategoria').val(respuesta['id']);
        }
    });

});
// =============================================================================
// Eliminar Categoria
// =============================================================================
$(document).on('click', '.btnEliminarCategoria', function() {

    var idCategoria = $(this).attr('idCategoria');

    swal({
        title: '¿Estas seguro de querer borrar la categoría?',
        text: 'Todavía estas a tiempo de cancelar',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar categoría'
    }).then((result) => {

        if (result.value) {

            window.location = 'index.php?ruta=categorias&idCategoria=' + idCategoria;
        }
    });
});