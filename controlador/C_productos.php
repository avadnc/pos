<?php

class ControladorProductos
{

// =============================================================================
// Mostrar Productos
// =============================================================================

    static public function ctrMostrarProductos($item,$valor)
    {
        $tabla = 'productos';

        $respuesta = ModeloProductos::MdlMostrarProductos($tabla, $item, $valor);

        return $respuesta;
    }
}