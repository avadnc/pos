<?php
/* Smarty version 3.1.34-dev-5, created on 2018-11-16 20:02:21
  from '/var/www/html/pos/smarty/templates/modulos/categorias.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-5',
  'unifunc' => 'content_5bef224d18d4d9_30880611',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2272bf7b87b5cdb2867c4c2a85dab7e99263362d' => 
    array (
      0 => '/var/www/html/pos/smarty/templates/modulos/categorias.tpl',
      1 => 1542398535,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bef224d18d4d9_30880611 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrar 
            <small>Categorias</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Administrar Categorias</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
               Agregar Categoria
               </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Refresco</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
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

<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post">
          <div class="modal-header" style="background:#3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Categoría</h4>
      </div>

            <div class="modal-body">
        <div class="box-body">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-th"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar Categoria">
                </div>
            </div>
          </div>
      </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
      
      <?php 
       
        $crearCategoria = new ControladorCategorias();
        $crearCategoria->ctrCrearCategoria();

      ?>
      
      </form>
    </div>
  </div>
</div>

<!-- Modal Editar Usuario -->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post" enctype="multipart/form-data">
          <div class="modal-header" style="background:#3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Categoria</h4>
      </div>

            <div class="modal-body">
        <div class="box-body">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-th"></i>
                    </span>
                    <input type="text" class="form-control input-lg" id="nombre" name="editarNombre">
                </div>
            </div>
          </div>
      </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
      
      <?php 
     
        //$crearUsuario = new ControladorUsuarios();
        //$crearUsuario->ctrEditarUsuario();
      
      ?>
      
      </form>
    </div>
  </div>
</div>
<?php 
    //$borrarUsuario = new ControladorUsuarios();
    //$borrarUsuario->ctrEliminarUsuario();
}
}
