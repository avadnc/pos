<?php

require_once 'controlador/C_principal.php';
require_once 'controlador/C_categorias.php';
require_once 'controlador/C_clientes.php';
require_once 'controlador/C_productos.php';
require_once 'controlador/C_usuarios.php';
require_once 'controlador/C_ventas.php';

require_once 'modelos/M_categorias.php';
require_once 'modelos/M_clientes.php';
require_once 'modelos/M_productos.php';
require_once 'modelos/M_usuarios.php';
require_once 'modelos/M_ventas.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Iniciamos el Index

$plantilla = new C_principal;
$plantilla->index();