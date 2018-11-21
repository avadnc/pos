<?php
require_once '../controlador/C_productos.php';
require_once '../modelos/M_productos.php';

class AjaxProductos
{
    public $idCategoria;
    // =========================================================================
    // Generar codigo a partir de idCategoria
    // =========================================================================

    public function ajaxCrearCodigoProducto()
    {
        $item = 'id_categoria';
        $valor = $this->idCategoria;

// $tabla='productos';

        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor,$tabla);
        echo json_encode($respuesta);
    }
}

// =============================================================================
// Generar codigo
// =============================================================================

if (isset($_POST['idCategoria'])) {
    $codigoProducto = new AjaxProductos();
    $codigoProducto->idCategoria = $_POST['idCategoria'];
    $codigoProducto->ajaxCrearCodigoProducto();
}