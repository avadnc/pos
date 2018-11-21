<?php

require_once '../controlador/C_productos.php';
require_once '../modelos/M_productos.php';

class TablaProductos
{
// =============================================================================
// mostrar tabla productos
// =============================================================================
    public function mostrarTablaProductos()
    {
        $item = null;
        $valor = null;
        $productos = ControladorProductos::ctrMostrarProductos($item, $valor);
        $productosJson['data'] = $productos;
        echo json_encode($productosJson);
    }

}

// =============================================================================
// activar tabla productos
// =============================================================================

$activarProductos = new TablaProductos();
$activarProductos->mostrarTablaProductos();