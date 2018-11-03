<?php
/* Smarty version 3.1.34-dev-5, created on 2018-11-01 00:54:07
  from '/var/www/html/pos/smarty/templates/modulos/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-5',
  'unifunc' => 'content_5bda94ff9edd74_83911782',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f996d8ba52edd197aab348a5962f31fbeefe1eec' => 
    array (
      0 => '/var/www/html/pos/smarty/templates/modulos/login.tpl',
      1 => 1541049621,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bda94ff9edd74_83911782 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="back"></div>
<div class="login-box">
    <div class="login-logo">
      <img src="img/logo.png" class="img-responsive" style="padding:30px 50px 0px 50px;" />
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Entrar al Sistema</p>

        <form method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
                <span class="glyphicon  glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                </div>
                <!-- /.col -->
            </div>
            
            <?php 

            $login = new ControladorUsuarios();
            $login->ctrIngresoUsuario();

            ?>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php }
}
