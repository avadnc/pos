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

            $stmt = Conexion::conectar()->prepare('SELECT productos.id, categorias.categoria as categoria, id_categoria, codigo, descripcion, imagen, stock, precio_compra, precio_venta, moneda, marca, ventas, fecha, claveprodserv, umed from  ' . $tabla . ' LEFT JOIN categorias on productos.id_categoria = categorias.id where ' .$tabla.'.'. $item . ' = :' . $item );

            $stmt->bindParam(':' . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();

        } else {

            $stmt = Conexion::conectar()->prepare('SELECT productos.id, categorias.categoria as categoria, codigo, descripcion, imagen, stock, precio_compra, precio_venta, moneda, marca, ventas, fecha, claveprodserv, umed from ' . $tabla . ' LEFT JOIN categorias on productos.id_categoria = categorias.id');

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        $stmt->close();
        $stmt->null;
    }

    public static function mdlIngresarProducto($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_categoria, codigo, descripcion, stock, precio_compra, precio_venta, imagen, claveprodserv, umed, moneda) 
        VALUES (:id_categoria,:codigo,:descripcion,:stock,:precio_compra,:precio_venta,:imagen,:claveprodserv,:umed,:moneda)");

        $stmt->bindParam(':id_categoria', $datos['id_categoria'], PDO::PARAM_STR);
        $stmt->bindParam(':codigo', $datos['codigo'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':stock', $datos['stock'], PDO::PARAM_STR);
        $stmt->bindParam(':precio_compra', $datos['precio_compra'], PDO::PARAM_STR);
        $stmt->bindParam(':precio_venta', $datos['precio_venta'], PDO::PARAM_STR);
        $stmt->bindParam(':imagen', $datos['imagen'], PDO::PARAM_STR);
        $stmt->bindParam(':claveprodserv', $datos['claveprodserv'], PDO::PARAM_STR);
        $stmt->bindParam(':umed', $datos['umed'], PDO::PARAM_STR);
        $stmt->bindParam(':moneda', $datos['moneda'], PDO::PARAM_STR);

        if ($stmt->execute()) {

            var_dump($stmt->errorInfo());
            return 'ok';

        } else {

            return 'error';

        }

        $stmt->close();
        $stmt->null;
    }

// =============================================================================
// editar producto
// =============================================================================

    public static function mdlEditarProducto($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE  $tabla SET id_categoria = :id_categoria, descripcion = :descripcion, stock = :stock, precio_compra = :precio_compra, precio_venta = :precio_venta, imagen = :imagen, claveprodserv = :claveprodserv, umed = :umed, moneda = :moneda WHERE codigo = :codigo");

        $stmt->bindParam(':id_categoria', $datos['id_categoria'], PDO::PARAM_STR);
        $stmt->bindParam(':codigo', $datos['codigo'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':stock', $datos['stock'], PDO::PARAM_STR);
        $stmt->bindParam(':precio_compra', $datos['precio_compra'], PDO::PARAM_STR);
        $stmt->bindParam(':precio_venta', $datos['precio_venta'], PDO::PARAM_STR);
        $stmt->bindParam(':imagen', $datos['imagen'], PDO::PARAM_STR);
        $stmt->bindParam(':claveprodserv', $datos['claveprodserv'], PDO::PARAM_STR);
        $stmt->bindParam(':umed', $datos['umed'], PDO::PARAM_STR);
        $stmt->bindParam(':moneda', $datos['moneda'], PDO::PARAM_STR);

        if ($stmt->execute()) {

            var_dump($stmt->errorInfo());
            return 'ok';

        } else {

            return 'error';

        }

        $stmt->close();
        $stmt->null;
    }

    // =========================================================================
    // Eliminar Producto
    // =========================================================================

    public static function mdlEliminarProducto($tabla,$datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(':id',$datos,PDO::PARAM_INT);
        
        var_dump($stmt);


        if ($stmt->execute()) {

            return 'ok';

        } else {

            return 'error';

        }

        $stmt->close();
        $stmt->null;
    }
}