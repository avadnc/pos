<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrar
            <small>Productos</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Productos</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
               Agregar Producto
               </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Imagen</th>
                            <th>Código</th>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th>Stock</th>
                            <th>Precio Compra</th>
                            <th>Precio Venta</th>
                            <th>Agregado en:</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="img/productos/producto.png" class="img-thumbnail" width="40px" ></td>
                            <td>00001</td>
                            <td>Zombie ipsum reversus ab viral inferno, nam rick grimes malum</td>
                            <td>Lorem Ipsum</td>
                            <td>20</td>
                            <td>$120</td>
                            <td>$250</td>
                            <td>0000-00-00 00:00:00</td>
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

<div id="modalAgregarProducto" class="modal fade" role="dialog">
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
                        <i class="fa fa-barcode"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar Codigo">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-tags"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar Descripcion">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-folder"></i>
                    </span>
                    <select class="form-control input-lg" name="nuevaCategoria">
                        <option value="">Seleccione Categoria</option>
                        <option value="Refreescos">Refrescos</option>
                        <option value="Lala">Lala</option>
                        <option value="Otras">Otras</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-cube"></i>
                    </span>
                    <input type="number" min="0" class="form-control input-lg" name="nuevoStock" placeholder="Ingresar Stock">
                </div>
            </div>

{*
// =============================================================================
// Inputs de precio de compra y venta
// =============================================================================
*}
            <div class="form-group row">
                <div class="col-xs-6">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-shopping-cart"></i>
                        </span>
                        <input type="number" min="0" class="form-control input-lg" name="nuevoPrecioCompra" placeholder="Ingresar Precio de Compra">
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-shopping-basket"></i>
                        </span>
                        <input type="number" min="0" class="form-control input-lg" name="nuevoPrecioVenta" placeholder="Ingresar Precio de Venta">
                    </div>
              
                <br>
                {* // ==========================================================
                   // Checkbox para porcentaje
                   // ========================================================== *}
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>
                            <input type="checkbox" class="minimal porcentaje" checked>
                            Utilizar Porcentaje %
                        </label>
                    </div>
                </div>
                {* // ==========================================================
                   // Entrada Porcentaje
                   // ========================================================== *}
                   <div class="col-xs-6" style="padding:0">
                        <div class="input-group">
                            <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="35" required>
                            <span class="input-group-addon">
                                <i class="fa fa-percent"></i>
                            </span>
                        </div>
                   </div>
                 </div>
             </div>

            <div clasS="form-group">
                <div class="panel">SUBIR IMAGEN</div>
                <input type="file" id="nuevaFoto" name="nuevaFoto">
                <p class="help-block">Tamaño Maximo de la foto 2Mb</p>
                <img src="img/productos/producto.png" class="img-thumbnail" width="100px">
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
      </form>
    </div>
  </div>
</div>