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

            var_dump($stmt->errorInfo());
            return 'ok';

        } else {

            return 'error';

        }

        $stmt->close();
        $stmt->null;
    }
}