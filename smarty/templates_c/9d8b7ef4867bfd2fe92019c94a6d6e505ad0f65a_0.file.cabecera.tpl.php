<?php
/* Smarty version 3.1.34-dev-5, created on 2018-10-30 00:39:58
  from '/var/www/html/pos/smarty/templates/modulos/cabecera.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-5',
  'unifunc' => 'content_5bd7eeaed78646_75791199',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d8b7ef4867bfd2fe92019c94a6d6e505ad0f65a' => 
    array (
      0 => '/var/www/html/pos/smarty/templates/modulos/cabecera.tpl',
      1 => 1540877853,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bd7eeaed78646_75791199 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</title>

    <!-- =================================================================== -->
    <!-- Secion para los estilos                                             -->
    <!-- =================================================================== -->

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- ======================================================================= -->
    <!-- Seccion para los Scripts                                                -->
    <!-- ======================================================================= -->

    <!-- jQuery 3 -->
    <?php echo '<script'; ?>
 src="bower_components/jquery/dist/jquery.min.js"><?php echo '</script'; ?>
>

    <!-- Bootstrap 3.3.7 -->
    <?php echo '<script'; ?>
 src="bower_components/bootstrap/dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>

    <!-- FastClick -->
    <?php echo '<script'; ?>
 src="bower_components/fastclick/lib/fastclick.js"><?php echo '</script'; ?>
>

    <!-- AdminLTE App -->
    <?php echo '<script'; ?>
 src="dist/js/adminlte.min.js"><?php echo '</script'; ?>
>


</head>

<!-- ======================================================================= -->
<!-- Cuerpo del Documento                                                    -->
<!-- ======================================================================= -->

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper"><?php }
}
