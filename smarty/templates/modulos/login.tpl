<div id="back"></div>
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
            
            {php}

            $login = new ControladorUsuarios();
            $login->ctrIngresoUsuario();

            {/php}
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

