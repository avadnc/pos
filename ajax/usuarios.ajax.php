<?php

require_once '../controlador/C_usuarios.php';
require_once '../modelos/M_usuarios.php';

class AjaxUsuarios
{

    // =========================================================================
    // Editar Usuario
    // =========================================================================

    public $idUsuario;

    public function ajaxEditarUsuario()
    {
        $item = 'id';
        $valor = $this->idUsuario;
        $respuesta = ControladorUsuarios::ctrMostraUsuarios($item,$valor);

        echo json_encode($respuesta);

    }
}

if (isset($_POST['idUsuario'])) {
    $editar = new AjaxUsuarios();
    $editar->idUsuario = $_POST['idUsuario'];
    $editar->ajaxEditarUsuario();
}