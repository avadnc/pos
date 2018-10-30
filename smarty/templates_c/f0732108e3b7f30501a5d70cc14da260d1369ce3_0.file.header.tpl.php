<?php
/* Smarty version 3.1.34-dev-5, created on 2018-10-30 00:22:19
  from '/var/www/html/pos/smarty/templates/modulos/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-5',
  'unifunc' => 'content_5bd7ea8b3000d0_11097213',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0732108e3b7f30501a5d70cc14da260d1369ce3' => 
    array (
      0 => '/var/www/html/pos/smarty/templates/modulos/header.tpl',
      1 => 1540862880,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bd7ea8b3000d0_11097213 (Smarty_Internal_Template $_smarty_tpl) {
?><header class="main-header">
    <!-- =================================================================== -->
    <!-- Logotipo                                                            -->
    <!-- =================================================================== -->
    <a href="" class="logo">

        <!-- Logo Mini -->

        <span class="logo-mini">
            <img src="img/pos/cash.png" class="img-responsive" style="padding: 10px;">

        </span>

        <!-- Logo Normal-->

        <span class="logo-lg">
            <b>Punto de Venta </b>POS
        </span>

    </a>

    <!-- =================================================================== -->
    <!-- Barra de navegación                                                 -->
    <!-- =================================================================== -->

    <nav class="navbar navbar-static-top" role="navigation">

        <!--Botón de navegación-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle Navigation</span>
        </a>

        <!--Perfil de Usuario-->

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="img/pos/usuarios/anonimo.jpg" class="user-image">
                        <span class="hidden-xs">Usuario</span>
                    </a>
                    <!--Dropdown toggle-->
                    <ul class="dropdown-menu">
                        <li class="user-body">
                            <div class="pull-right">
                                <a href="" class="btn btn-default btn-flat">Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header><?php }
}
