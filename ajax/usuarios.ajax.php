<?php

require_once '../controlador/C_usuarios.php';
require_once '../modelos/M_usuarios.php';

class AjaxUsuarios
{

    // =========================================================================
    // Editar Usuario
    // =========================================================================

    public $idUsuario;
    public $activarUsuario;
    public $activarId;
    public $validarUsuario;

    public function ajaxEditarUsuario()
    {
        $item = 'id';
        $valor = $this->idUsuario;
        $respuesta = ControladorUsuarios::ctrMostraUsuarios($item, $valor);

        echo json_encode($respuesta);

    }

    // =========================================================================
    // Activar Usuario
    // =========================================================================

    public function ajaxActivarUsuario()
    {
        $tabla = 'usuarios';
        $item1 = 'estado';
        $valor1 = $this->activarUsuario;
        $item2 = 'id';
        $valor2 = $this->activarId;

        $respuesta = ModeloUsuarios::MdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
    }

    // =========================================================================
    // validar si existe usuario
    // ========================================================================
    public function ajaxValidarUsuario()
    {

        $item = 'usuario';
        $valor = $this->validarUsuario;
        $respuesta = ControladorUsuarios::ctrMostraUsuarios($item, $valor);

        echo json_encode($respuesta);
    }

    // =========================================================================
    // borrar usuario
    // =========================================================================
}

if (isset($_POST['idUsuario'])) {
    $editar = new AjaxUsuarios();
    $editar->idUsuario = $_POST['idUsuario'];
    $editar->ajaxEditarUsuario();
}

if (isset($_POST['activarUsuario'])) {

    $activarUsuario = new AjaxUsuarios();
    $activarUsuario->activarUsuario = $_POST['activarUsuario'];
    $activarUsuario->activarId = $_POST['activarId'];
    $activarUsuario->ajaxActivarUsuario();
}

if (isset($_POST['validarUsuario'])) {

    $validarUsuario = new AjaxUsuarios();
    $validarUsuario->validarUsuario = $_POST['validarUsuario'];
    $validarUsuario->ajaxValidarUsuario();
}