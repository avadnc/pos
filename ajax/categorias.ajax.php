<?php
require_once '../controlador/C_categorias.php';
require_once '../modelos/M_categorias.php';

class AjaxCategorias{

    public $idCategoria;
    
    public function ajaxEditarCategoria()
    {
        $item = 'id';
        $valor = $this->idCategoria;
        $respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

        echo json_encode($respuesta);
    }

}

// =============================================================================
// Objeto Categoarias
// =============================================================================

if(isset($_POST['idCategoria'])){
    $editar = new AjaxCategorias();
    $editar->idCategoria = $_POST['idCategoria'];
    $editar->ajaxEditarCategoria();
}