<?php

require_once 'controlador/C_principal.php';
require_once 'controlador/C_categorias.php';
require_once 'controlador/C_clientes.php';
require_once 'controlador/C_productos.php';
require_once 'controlador/C_usuarios.php';
require_once 'controlador/C_ventas.php';

require_once 'modelo/M_categorias.php';
require_once 'modelo/M_clientes.php';
require_once 'modelo/M_productos.php';
require_once 'modelo/M_usuarios.php';
require_once 'modelo/M_ventas.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$plantilla = new C_principal;
$plantilla->assign('titulo', 'titulo de prueba a cambiar');
//parte del head
$plantilla->display('modulos/cabecera.tpl');
//seccion header
$plantilla->display('modulos/header.tpl');
//seccion asode
$plantilla->display('modulos/menu.tpl');
//contenido
if (isset($_GET['ruta'])){

    if( $_GET['ruta'] == 'dashboard'||
        $_GET['ruta'] == 'usuarios' ||
        $_GET['ruta'] == 'categorias' ||
        $_GET['ruta'] == 'productos' ||
        $_GET['ruta'] == 'clientes' ||
        $_GET['ruta'] == 'crear-ventas' ||
        $_GET['ruta'] == 'administrar-ventas'||
        $_GET['ruta'] == 'reporte-ventas'){

        $plantilla->display('modulos/'.$_GET['ruta'].'.tpl');

    } else {
        $plantilla->display('modulos/404.tpl');
    }
} else {
    $plantilla->display('modulos/dashboard.tpl');
}


//footer de la pagina
$plantilla->display('modulos/footer.tpl');
//cierre del body
$plantilla->display('modulos/piepagina.tpl');