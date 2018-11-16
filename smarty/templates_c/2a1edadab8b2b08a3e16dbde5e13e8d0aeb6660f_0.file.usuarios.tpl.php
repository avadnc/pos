<?php
/* Smarty version 3.1.34-dev-5, created on 2018-11-16 17:57:32
  from '/var/www/html/pos/smarty/templates/modulos/usuarios.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-5',
  'unifunc' => 'content_5bef050c5afb86_87607266',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a1edadab8b2b08a3e16dbde5e13e8d0aeb6660f' => 
    array (
      0 => '/var/www/html/pos/smarty/templates/modulos/usuarios.tpl',
      1 => 1542391049,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bef050c5afb86_87607266 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrar Usuarios
            <small>Usuarios</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Usuarios</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
               Agregar Usuario
               </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Foto</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Último Login</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios']->value, 'i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
?>
                          <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value['nombre'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value['usuario'];?>
</td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['i']->value['foto'] == '') {?>
                                <img src="img/usuarios/anonimo.jpg" class="img-thumbnail" width="40px" >
                                <?php } else { ?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['i']->value['foto'];?>
" class="img-thumbnail" width="40px" >
                                <?php }?>
                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value['perfil'];?>
</td>
                            <td>
                            <?php if ($_smarty_tpl->tpl_vars['usuarioId']->value == $_smarty_tpl->tpl_vars['i']->value['id']) {?>
                                <button class="btn btn-success btn-xs btnActivar" disabled>Activado</button>
                            <?php } elseif ($_smarty_tpl->tpl_vars['i']->value['estado'] == "1") {?>
                                <button idUsuario="<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
" usuarioActual="<?php echo $_smarty_tpl->tpl_vars['usuarioId']->value;?>
" estadoUsuario="0" class="btn btn-success btn-xs btnActivar">Activado</button>
                            <?php } else { ?>
                                <button idUsuario="<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
" usuarioActual="<?php echo $_smarty_tpl->tpl_vars['usuarioId']->value;?>
" estadoUsuario="1" class="btn btn-danger btn-xs btnActivar">Desactivado</button>
                            <?php }?>
                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value['ultimo_login'];?>
</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning btnEditarUsuario" idUsuario="<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
" data-toggle="modal" data-target="#modalEditarUsuario">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <?php if ($_smarty_tpl->tpl_vars['usuarioId']->value == $_smarty_tpl->tpl_vars['i']->value['id']) {?>
                                    <button class="btn btn-danger btnEliminarUsuario" usuarioActual="<?php echo $_smarty_tpl->tpl_vars['usuarioId']->value;?>
" idUsuario="<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
" fotoUsuario="<?php echo $_smarty_tpl->tpl_vars['i']->value['foto'];?>
" usuario="<?php echo $_smarty_tpl->tpl_vars['i']->value['usuario'];?>
" disabled>
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <?php } else { ?>
                                     <button class="btn btn-danger btnEliminarUsuario" usuarioActual="<?php echo $_smarty_tpl->tpl_vars['usuarioId']->value;?>
" idUsuario="<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
" fotoUsuario="<?php echo $_smarty_tpl->tpl_vars['i']->value['foto'];?>
" usuario="<?php echo $_smarty_tpl->tpl_vars['i']->value['usuario'];?>
">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <?php }?>
                                </div>
                            </td>
                        </tr>
                       <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Agregar Usuario -->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post" enctype="multipart/form-data">
          <div class="modal-header" style="background:#3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Usuarios</h4>
      </div>

            <div class="modal-body">
        <div class="box-body">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-key"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="nuevoUsuario" id="nuevoUsuario" placeholder="Ingresar Usuario">
                </div>
            </div>
           <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-lock"></i>
                    </span>
                    <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Contraseña" required>
                </div>
            </div>
           <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-users"></i>
                    </span>
                    <select class="form-control input-lg" name="nuevoPerfil">
                        <option value="">Seleccione Pefil</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Especial">Especial</option>
                        <option value="Vendedor">Vendedor</option>
                    </select>
                </div>
            </div>
            <div clasS="form-group">
                <div class="panel">SUBIR FOTO</div>
                <input type="file" class="nuevaFoto" name="nuevaFoto">
                <p class="help-block">Tamaño Maximo de la foto 200Kb</p>
                <img src="img/usuarios/anonimo.jpg" class="img-thumbnail previsualizar" width="100px">
            </div>
          </div>
      </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
      
      <?php 
       
        $crearUsuario = new ControladorUsuarios();
        $crearUsuario->ctrCrearUsuario();

      ?>
      
      </form>
    </div>
  </div>
</div>

<!-- Modal Editar Usuario -->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post" enctype="multipart/form-data">
          <div class="modal-header" style="background:#3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Usuarios</h4>
      </div>

            <div class="modal-body">
        <div class="box-body">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </span>
                    <input type="text" class="form-control input-lg" id="nombre" name="editarNombre">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-key"></i>
                    </span>
                    <input type="text" class="form-control input-lg" id="usuario" name="editarUsuario" readonly>
                </div>
            </div>
           <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-lock"></i>
                    </span>
                    <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva Contraseña">
                    <input type="hidden" id="passwordActual" name="passwordActual" >
                </div>
            </div>
           <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-users"></i>
                    </span>
                    <select class="form-control input-lg" name="editarPerfil">
                        <option id="perfil"></option>
                        <option value="Administrador">Administrador</option>
                        <option value="Especial">Especial</option>
                        <option value="Vendedor">Vendedor</option>
                    </select>
                </div>
            </div>
            <div clasS="form-group">
                <div class="panel">SUBIR FOTO</div>
                <input type="file" class="nuevaFoto" name="editarFoto">
                <p class="help-block">Tamaño Maximo de la foto 200Kb</p>
                <img src="img/usuarios/anonimo.jpg" id="foto" class="img-thumbnail previsualizar" width="100px">
                <input type="hidden" id="fotoActual" name="fotoActual">
            </div>
          </div>
      </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
      
      <?php 
     
        $crearUsuario = new ControladorUsuarios();
        $crearUsuario->ctrEditarUsuario();
      
      ?>
      
      </form>
    </div>
  </div>
</div>
<?php 
    $borrarUsuario = new ControladorUsuarios();
    $borrarUsuario->ctrEliminarUsuario();
}
}
