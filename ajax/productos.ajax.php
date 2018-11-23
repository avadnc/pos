<?php
require_once '../controlador/C_productos.php';
require_once '../modelos/M_productos.php';

class AjaxProductos
{
    public $codigProducto;
    public $idProducto;

    // =========================================================================
    // Consultar codigo a partir de idCategoria
    // =========================================================================

    public function ajaxConsultarCodigoProducto()
    {
        $item = 'codigo';
        $valor = $this->codigoProducto;

        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor,$tabla);
        echo json_encode($respuesta);
    }

    // =========================================================================
    // Editar Prodcuto
    // =========================================================================

    public function ajaxEditarProducto()
    {
        $item = 'id';
        $valor = $this->idProducto;

        $respuesta = ControladorProductos::ctrMostrarProductos($item,$valor);

        echo json_encode($respuesta);
        
    }
}

// =============================================================================
// Generar codigo
// =============================================================================

if (isset($_POST['codigoProducto'])) {
    $codigoProducto = new AjaxProductos();
    $codigoProducto->codigoProducto = $_POST['codigoProducto'];
    $codigoProducto->ajaxConsultarCodigoProducto();
}

// =============================================================================
// Objeto editar producto
// =============================================================================
if (isset($_POST['idProducto'])) {
    $editarProducto = new AjaxProductos();
    $editarProducto->idProducto = $_POST['idProducto'];
    $editarProducto->ajaxEditarProducto();
}
