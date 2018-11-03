<?php
// require($_SERVER['DOCUMENT_ROOT'] . '/pos/smarty/Smarty.class.php');
require($_SERVER['DOCUMENT_ROOT'] . '/pos/smarty/SmartyBC.class.php');

class C_principal extends SmartyBC
{


    function __construct()
    {
        parent::__construct();

        require($_SERVER['DOCUMENT_ROOT'] . '/pos/config/config.php');

        $this->setTemplateDir($config['base_url'] . '/smarty/templates');
        $this->setCompileDir($config['base_url'] . '/smarty/templates_c');
    }

    static public function salir()
    {

        session_destroy();
        echo '<script> window.location = "login"; </script>';
        exit;
    }

    static public function index()
    {
        $plantilla = new C_principal;
        // $plantilla = new C_principal;
        $plantilla->assign('titulo', 'titulo de prueba a cambiar');
        //parte del head
        $plantilla->display('modulos/cabecera.tpl');
        if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == 'ok') {
        //seccion header
            $plantilla->display('modulos/header.tpl');
        //seccion asode
            $plantilla->display('modulos/menu.tpl');
        //contenido
            if (isset($_GET['ruta'])) {

                if ($_GET['ruta'] == 'dashboard' ||
                    $_GET['ruta'] == 'usuarios' ||
                    $_GET['ruta'] == 'categorias' ||
                    $_GET['ruta'] == 'productos' ||
                    $_GET['ruta'] == 'clientes' ||
                    $_GET['ruta'] == 'crear-ventas' ||
                    $_GET['ruta'] == 'administrar-ventas' ||
                    $_GET['ruta'] == 'reporte-ventas') {

                    $plantilla->display('modulos/' . $_GET['ruta'] . '.tpl');

                } else if ($_GET['ruta'] == 'salir') {

                    C_principal::salir();

                } else {
                    $plantilla->display('modulos/404.tpl');
                }
            } else {
                $plantilla->display('modulos/dashboard.tpl');
            }
    //footer de la pagina
            $plantilla->display('modulos/footer.tpl');

        } else {
            $plantilla->display('modulos/login.tpl');
        }
//cierre del body
        $plantilla->display('modulos/piepagina.tpl');
    }
}