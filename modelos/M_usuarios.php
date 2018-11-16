<?php

require_once 'conexion.php';

class ModeloUsuarios
{

    // =========================================================================
    // Mostar Usuarios

    // id, nombre, usuario, password, perfil, foto, estado, ultimo_login, fecha
    // =========================================================================

    static public function MdlMostrarUsuarios($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare('SELECT id, nombre, usuario, password, perfil, foto, estado, ultimo_login, fecha from ' . $tabla . ' where ' . $item . ' = :' . $item);

            $stmt->bindParam(':' . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare('SELECT id, nombre, usuario, password, perfil, foto, estado, ultimo_login, fecha from ' . $tabla );

            $stmt->execute();
            return $stmt->fetchAll();
        }


        $stmt->close();
        $stmt->null;
    }

    // =========================================================================
    // Registrar Usuario
    // =========================================================================

    static public function MdlIngresaUsuarios($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, usuario, password, perfil, foto) VALUES(:nombre, :usuario, :password, :perfil, :foto)");

        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':usuario', $datos['usuario'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $datos['password'], PDO::PARAM_STR);
        $stmt->bindParam(':perfil', $datos['perfil'], PDO::PARAM_STR);
        $stmt->bindParam(':foto', $datos['foto'], PDO::PARAM_STR);
        
        // var_dump($datos);
        // $stmt->execute();

        // var_dump($stmt->errorInfo());

        if ($stmt->execute()) {

            // var_dump($stmt->errorInfo());
            return 'ok';

        } else {

            return 'error';

        }

        $stmt->close();
        $stmt->null;
    }

    public static function MdlEditarUsuario($tabla,$datos)
    {
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario");
        
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':usuario', $datos['usuario'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $datos['password'], PDO::PARAM_STR);
        $stmt->bindParam(':perfil', $datos['perfil'], PDO::PARAM_STR);
        $stmt->bindParam(':foto', $datos['foto'], PDO::PARAM_STR);

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
    // Actualizar Usuario
    // =========================================================================

    public static function MdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
        $stmt->bindParam(':'.$item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(':'.$item2, $valor2, PDO::PARAM_STR);
        if ($stmt->execute()) {

            // var_dump($stmt->errorInfo());
            return 'ok';

        } else {

            return 'error';

        }

        $stmt->close();
        $stmt->null;
    }

    public static function MdlBorrarUsuario($tabla,$datos)
    {
        
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(':id',$datos,PDO::PARAM_STR);
        if ($stmt->execute()) {

            // var_dump($stmt->errorInfo());
            return 'ok';

        } else {

            return 'error';

        }

        $stmt->close();
        $stmt->null;
    }
}