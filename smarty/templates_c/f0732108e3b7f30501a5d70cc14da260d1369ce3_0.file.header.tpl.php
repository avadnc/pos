<?php
/* Smarty version 3.1.34-dev-5, created on 2018-11-09 00:18:11
  from '/var/www/html/pos/smarty/templates/modulos/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-5',
  'unifunc' => 'content_5be4d243c53f55_69565499',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0732108e3b7f30501a5d70cc14da260d1369ce3' => 
    array (
      0 => '/var/www/html/pos/smarty/templates/modulos/header.tpl',
      1 => 1541722683,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be4d243c53f55_69565499 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Site wrapper -->
<div class="wrapper">

<header class="main-header">
    <!-- =================================================================== -->
    <!-- Logotipo                                                            -->
    <!-- =================================================================== -->
    <a class="logo">

        <!-- Logo Mini -->

        <span class="logo-mini">
            <img src="img/cash.png" class="img-responsive" style="padding: 10px;">

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
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <?php if ($_smarty_tpl->tpl_vars['foto']->value == '') {?>
                        <img src="img/anonimo.jpg" class="user-image">
                        <?php } else { ?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['foto']->value;?>
" class="user-image">
                        <?php }?>
                        <span class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
</span>
                    </a>
                    <!--Dropdown toggle-->
                    <ul class="dropdown-menu">
                        <li class="user-body text-center">
                       
                        <?php if ($_smarty_tpl->tpl_vars['perfil']->value == "Administrador") {?>
                            <h2><span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['perfil']->value;?>
</span></h2>
                        <?php } elseif ($_smarty_tpl->tpl_vars['perfil']->value == "Especial") {?>
                           <h2> <span class="label label-primary"><?php echo $_smarty_tpl->tpl_vars['perfil']->value;?>
</span></h2>
                        <?php } else { ?>
                            <h2><span class="label label-default pull-right"><?php echo $_smarty_tpl->tpl_vars['perfil']->value;?>
</span></h2>
                        <?php }?>
                        </li>
                             <li class="user-footer">
                            <div class="pull-right">
                                <a href="salir" class="btn btn-default btn-flat">Salir</a>
                            </div>
                            </li>
                        
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header><?php }
}
