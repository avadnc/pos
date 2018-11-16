<!-- Content Wrapper. Contains page content -->
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
                    {*  Inicia Foreach para categorias *}
                    
                    {foreach $categorias item=i}
                        <tr>
                            <td>{$i.id}</td>
                            <td>{$i.categoria}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning btnEditarCategoria" idCategoria="{$i.id}" data-toggle="modal" data-target="#modalEditarCategoria">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button class="btn btn-danger btnEliminarCategoria" idCategoria="{$i.id}">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>                            
                        </tr>
                    {/foreach}

                    {* Finaliza Foreach *}
                    
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
    {* // =========================================================================
    // cabecera Modal
    // ========================================================================= *}
      <div class="modal-header" style="background:#3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Categoría</h4>
      </div>

      {* // =======================================================================
      // Cuerpo del Modal
      // ======================================================================= *}
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
      {* // =======================================================================
      // Footer del modal
      // ======================================================================= *}
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
      
      {php}
       
        $crearCategoria = new ControladorCategorias();
        $crearCategoria->ctrCrearCategoria();

      {/php}
      
      </form>
    </div>
  </div>
</div>

<!-- Modal Editar Categoria -->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post" enctype="multipart/form-data">
    {* // =========================================================================
    // cabecera Modal
    // ========================================================================= *}
      <div class="modal-header" style="background:#3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Categoria</h4>
      </div>

      {* // =======================================================================
      // Cuerpo del Modal
      // ======================================================================= *}
      <div class="modal-body">
        <div class="box-body">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-th"></i>
                    </span>
                    <input type="text" class="form-control input-lg" id="categoria" name="editarCategoria">
                    <input type="hidden" name="idCategoria" id="idCategoria">
                </div>
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
     
        $editarCategoria = new ControladorCategorias();
        $editarCategoria->ctrEditarCategoria();
      
      {/php}
      
      </form>
    </div>
  </div>
</div>
{php}
    $borrarCategoria = new ControladorCategorias();
    $borrarCategoria->ctrBorrarCategoria();
{/php}
