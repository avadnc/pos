<?php

require_once 'controlador/C_principal.php';

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
$plantilla->display('modulos/dashboard.tpl');
//footer de la pagina
$plantilla->display('modulos/footer.tpl');
//cierre del body
$plantilla->display('modulos/piepagina.tpl');