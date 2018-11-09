<!-- Content Wrapper. Contains page content -->
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
                    {foreach from=$usuarios item=i}
                          <tr>
                            <td>{$i.id}</td>
                            <td>{$i.nombre}</td>
                            <td>{$i.usuario}</td>
                            <td>
                                {if $i.foto eq ""}
                                <img src="img/usuarios/anonimo.jpg" class="img-thumbnail" width="40px" >
                                {else}
                                <img src="{$i.foto}" class="img-thumbnail" width="40px" >
                                {/if}
                            </td>
                            <td>{$i.perfil}</td>
                            <td>
                            {if $i.estado eq "1"}
                            <button class="btn btn-success btn-xs">Activado</button>
                            {else}
                            <button class="btn btn-danger btn-xs">Desactivado</button>
                            {/if}
                            </td>
                            <td>{$i.ultimo_login}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning btnEditarUsuario" idUsuario="{$i.id}" data-toggle="modal" data-target="#modalEditarUsuario">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                       {/foreach}
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
    {* // =========================================================================
    // cabecera Modal
    // ========================================================================= *}
      <div class="modal-header" style="background:#3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Usuarios</h4>
      </div>

      {* // =======================================================================
      // Cuerpo del Modal
      // ======================================================================= *}
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
                    <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Usuario">
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
      {* // =======================================================================
      // Footer del modal
      // ======================================================================= *}
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
      
      {php}
       
        $crearUsuario = new ControladorUsuarios();
        $crearUsuario->ctrCrearUsuario();

      {/php}
      
      </form>
    </div>
  </div>
</div>

<!-- Modal Editar Usuario -->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post" enctype="multipart/form-data">
    {* // =========================================================================
    // cabecera Modal
    // ========================================================================= *}
      <div class="modal-header" style="background:#3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Usuarios</h4>
      </div>

      {* // =======================================================================
      // Cuerpo del Modal
      // ======================================================================= *}
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
      {* // =======================================================================
      // Footer del modal
      // ======================================================================= *}
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
      
      {php}
     
        $crearUsuario = new ControladorUsuarios();
        $crearUsuario->ctrEditarUsuario();
      
      {/php}
      
      </form>
    </div>
  </div>
</div>