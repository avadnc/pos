<?php
/* Smarty version 3.1.34-dev-5, created on 2018-10-30 00:22:19
  from '/var/www/html/pos/smarty/templates/modulos/menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-5',
  'unifunc' => 'content_5bd7ea8b302005_57295631',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40f060d884be2439c4222327a93d17a4115d6328' => 
    array (
      0 => '/var/www/html/pos/smarty/templates/modulos/menu.tpl',
      1 => 1540863607,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bd7ea8b302005_57295631 (Smarty_Internal_Template $_smarty_tpl) {
?><aside class="main-sidebar">
    <section class="sidebar">

        <ul class="sidebar-menu">
            <li class="active">
                <a href="dashboard">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="usuarios">
                    <i class="fa fa-user"></i>
                    <span>Usuarios</span>
                </a>
            </li>
            <li>
                <a href="categorias">
                    <i class="fa fa-th"></i>
                    <span>Categorias</span>
                </a>
            </li>
            <li>
                <a href="productos">
                    <i class="fa fa-product-hunt"></i>
                    <span>Productos</span>
                </a>
            </li>
            <li>
                <a href="clientes">
                    <i class="fa fa-users"></i>
                    <span>Clientes</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list-ul"></i>
                    <span>Ventas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="administrar-ventas">
                            <i class="fa fa-circle-o"></i>
                            <span>Administrar Ventas</span>
                        </a>
                    </li>
                    <li>
                        <a href="crear-ventas">
                            <i class="fa fa-circle-o"></i>
                            <span>Crear Venta</span>
                        </a>
                    </li>
                    <li>
                        <a href="reporte-ventas">
                            <i class="fa fa-circle-o"></i>
                            <span>Reporte Ventas</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
</aside><?php }
}
