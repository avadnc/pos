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

    // =========================================================================
    // Editar Categoria
    // =========================================================================

    public static function mdlEditarCategoria($tabla, $valor)
    {

        $stmt = Conexion::conectar()->prepare('UPDATE ' . $tabla . ' SET categoria = :categoria WHERE id = :id');

        $stmt->bindParam(':categoria', $valor['categoria'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $valor['id'], PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->execute()) {

            return 'ok';

        } else {

            return 'error';

        }

        $stmt->close();
        $stmt->null;
    }

    // =========================================================================
    // Borrar Categoria
    // =========================================================================

    public static function mdlBorrarCategoria($tabla, $valor)
    {
        $stmt = Conexion::conectar()->prepare('DELETE from ' . $tabla . ' WHERE id = :id');

        $stmt->bindParam(':id', $valor, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return 'ok';

        } else {

            return 'error';

        }

        $stmt->close();
        $stmt->null;
    }
}