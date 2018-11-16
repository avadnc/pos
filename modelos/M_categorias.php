<?php

require_once 'conexion.php';

class ModeloCategorias
{

    // =========================================================================
    // Crear Categoria
    // =========================================================================
    public static function mdlIngresarCategoria($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (categoria) VALUES(:categoria)");

        $stmt->bindParam(':categoria', $datos, PDO::PARAM_STR);

        if ($stmt->execute()) {

            // var_dump($stmt->errorInfo());
            return 'ok';

        } else {

            return 'error';

        }

        $stmt->close();
        $stmt->null;
    }

    // =========================================================================
    // Mostrar categorias
    // =========================================================================
    public static function mdlMostrarCategorias($tabla, $item, $valor)
    {
        if ($item != null) {

            $stmt = Conexion::conectar()->prepare('SELECT id, categoria from ' . $tabla . ' where ' . $item . ' = :' . $item);

            $stmt->bindParam(':' . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
            
        } else {

            $stmt = Conexion::conectar()->prepare('SELECT id, categoria from ' . $tabla);

            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt->null;

    }
}