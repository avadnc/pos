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
        $stmt = Conexion::conectar()->prepare('SELECT * from '.$tabla.' where '.$item.' = :'.$item);
       
        $stmt->bindParam(':' . $item, $valor, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();
    }
}