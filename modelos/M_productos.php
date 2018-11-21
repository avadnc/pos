<?php
require_once 'conexion.php';

class ModeloProductos
{
    // =========================================================================
    // Mostrar Prodcutos
    // =========================================================================
    public static function mdlMostrarProductos($tabla, $item, $valor)
    {
        if ($item != null) {

            $stmt = Conexion::conectar()->prepare('SELECT id, id_categoria, codigo, descripcion, imagen, stock, precio_compra, precio_venta, moneda, marca, ventas, fecha, claveprodserv, umed from ' . $tabla . ' where ' . $item . ' = :' . $item .' ORDER BY ID DESC');

            $stmt->bindParam(':' . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();

        } else {

            $stmt = Conexion::conectar()->prepare('SELECT productos.id, categorias.categoria as categoria, codigo, descripcion, imagen, stock, precio_compra, precio_venta, moneda, marca, ventas, fecha, claveprodserv, umed from ' . $tabla . ' LEFT JOIN categorias on productos.id_categoria = categorias.id' );

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        $stmt->close();
        $stmt->null;

        
    }
}