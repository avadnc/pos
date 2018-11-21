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

            $plantilla->assign('nombre', $_SESSION['nombre']);
            $plantilla->assign('foto', $_SESSION['foto']);
            $plantilla->assign('perfil', $_SESSION['perfil']);
            $plantilla->assign('usuarioId', $_SESSION['id']);


            switch ($_GET['ruta']) {

                case 'dashboard':
                    $plantilla->display('modulos/header.tpl');
                    $plantilla->display('modulos/menu.tpl');
                    $plantilla->display('modulos/dashboard.tpl');
                    $plantilla->display('modulos/footer.tpl');
                    $plantilla->display('modulos/piepagina.tpl');
                    break;

                case 'usuarios':

                    $item = null;
                    $valor = null;
                    $usuarios = ControladorUsuarios::ctrMostraUsuarios($item, $valor);

                    $plantilla->assign('usuarios', $usuarios);

                    $plantilla->display('modulos/header.tpl');
                    $plantilla->display('modulos/menu.tpl');
                    $plantilla->display('modulos/usuarios.tpl');
                    $plantilla->display('modulos/footer.tpl');
                    $plantilla->display('modulos/piepagina.tpl');
                    break;

                case 'categorias':

                    $item = null;
                    $valor = null;
                    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                    $plantilla->assign('categorias', $categorias);

                    $plantilla->display('modulos/header.tpl');
                    $plantilla->display('modulos/menu.tpl');
                    $plantilla->display('modulos/categorias.tpl');
                    $plantilla->display('modulos/footer.tpl');
                    $plantilla->display('modulos/piepagina.tpl');
                    break;

                case 'productos':

                    $item = null;
                    $valor = null;
                    $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

                    $plantilla->assign('productos', $productos);
                    
                    $item = null;
                    $valor = null;
                    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                    $plantilla->assign('categorias', $categorias);

                    $plantilla->display('modulos/header.tpl');
                    $plantilla->display('modulos/menu.tpl');
                    $plantilla->display('modulos/productos.tpl');
                    $plantilla->display('modulos/footer.tpl');
                    $plantilla->display('modulos/piepagina.tpl');
                    break;

                case 'clientes':
                    $plantilla->display('modulos/header.tpl');
                    $plantilla->display('modulos/menu.tpl');
                    $plantilla->display('modulos/dashboard.tpl');
                    $plantilla->display('modulos/footer.tpl');
                    $plantilla->display('modulos/piepagina.tpl');
                    break;

                case 'crear-ventas':
                    $plantilla->display('modulos/header.tpl');
                    $plantilla->display('modulos/menu.tpl');
                    $plantilla->display('modulos/clientes.tpl');
                    $plantilla->display('modulos/footer.tpl');
                    $plantilla->display('modulos/piepagina.tpl');
                    break;

                case 'administrar-ventas':
                    $plantilla->display('modulos/header.tpl');
                    $plantilla->display('modulos/menu.tpl');
                    $plantilla->display('modulos/administrar-ventas.tpl');
                    $plantilla->display('modulos/footer.tpl');
                    $plantilla->display('modulos/piepagina.tpl');
                    break;

                case 'reporte-ventas':
                    $plantilla->display('modulos/header.tpl');
                    $plantilla->display('modulos/menu.tpl');
                    $plantilla->display('modulos/reporte-ventas.tpl');
                    $plantilla->display('modulos/footer.tpl');
                    $plantilla->display('modulos/piepagina.tpl');
                    break;

                case 'salir':
                    C_principal::salir();
                    break;

                default:
                    $plantilla->display('modulos/header.tpl');
                    $plantilla->display('modulos/menu.tpl');
                    $plantilla->display('modulos/dashboard.tpl');
                    $plantilla->display('modulos/footer.tpl');
                    $plantilla->display('modulos/piepagina.tpl');
                    break;
            }

        } 
            //si no esta iniciada la sesión que agarre el login
        else {

            $plantilla->display('modulos/login.tpl');
            $plantilla->display('modulos/piepagina.tpl');
        }
    }
}
