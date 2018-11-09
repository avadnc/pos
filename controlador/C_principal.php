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

    public static function cabecera()
    {
         //seccion header
        $plantilla->display('modulos/header.tpl');
         //seccion asode
        $plantilla->display('modulos/menu.tpl');
    }

    public static function piepagina()
    {
        $plantilla->display('modulos/piepagina.tpl');

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


           
        //contenido
            if (isset($_GET['ruta'])) {

                switch ($_GET['ruta']) {

                    case 'dashboard':
                        C_principal::cabecera();
                        $plantilla->display('modulos/dashboard.tpl');
                        break;
                    case 'usuarios':
                        $plantilla->display('modulos/usuarios.tpl');
                        break;

                    case 'categorias':
                        $plantilla->display('modulos/categorias.tpl');
                        break;

                    case 'productos':
                        $plantilla->display('modulos/productos.tpl');
                        break;

                    case 'clientes':
                        $plantilla->display('modulos/clientes.tpl');
                        break;

                    case 'crear-ventas':
                        $plantilla->display('modulos/crear-ventas.tpl');
                        break;

                    case 'administrar-ventas':
                        $plantilla->display('modulos/administrar-ventas.tpl');
                        break;

                    case 'reporte-ventas':
                        $plantilla->display('modulos/reporte-ventas.tpl');
                        break;

                    case 'salir':
                        C_principal::salir();
                        break;

                    default:

                        $plantilla->display('modulos/404.tpl');
                        break;
                }

            } 
            //si no esta iniciada la sesión que agarre el login
        } else {
            $plantilla->display('modulos/login.tpl');
        }
    }
}
