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
                <table class="table table-bordered table-striped dt-responsive tablaProductos">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>categoria</th>
                            <th>codigo</th>
                            <th>descripcion</th>
                            <th>imagen</th>
                            <th>stock</th>
                            <th>precio_compra</th>
                            <th>precio_venta</th>
                            <th>moneda</th>
                            <th>marca</th>
                            <th>ventas</th>
                            <th>fecha</th>
                            <th>claveprodserv</th>
                            <th>umed</th>
                            <th>acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Agregar Producto -->

<div id="modalAgregarProducto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post" enctype="multipart/form-data">
    {* // =========================================================================
    // cabecera Modal
    // ========================================================================= *}
      <div class="modal-header" style="background:#3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Producto</h4>
      </div>

      {* // =======================================================================
      // Cuerpo del Modal
      // ======================================================================= *}
      <div class="modal-body">
        <div class="box-body">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-folder"></i>
                    </span>
                    <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria">
                    <option>Seleccionar Categoria</option>
                    {foreach $categorias item=i}
                    
                        <option value="{$i.id}">{$i.categoria}</option>

                    {/foreach}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-barcode"></i>
                    </span>
                    <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar Codigo">
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
                <div class="col-xs-12 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-shopping-cart"></i>
                        </span>
                        <input type="number" min="0" step="any" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" placeholder="Precio de Compra">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-shopping-basket"></i>
                        </span>
                        <input type="number" min="0" step="any" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" placeholder="Precio de Venta">
                    </div>
              
                <br>
                {* // ==========================================================
                   // Checkbox para porcentaje
                   // ========================================================== *}
                <div class="col-xs-12 col-sm-6">
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
                   <div class="col-xs-12 col-sm-6" style="padding:0">
                        <div class="input-group">
                            <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="35" required>
                            <span class="input-group-addon">
                                <i class="fa fa-percent"></i>
                            </span>
                        </div>
                   </div>
                 </div>
             </div>
            

            {*// ===============================================================
              // Clave Producto Servicio + UMED
              // ===============================================================*}
            <div class="form-group row">
                <div class="col-xs-12 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-code"></i>
                        </span>
                        <input type="number" class="form-control input-lg" name="nuevaClaveProdServ" placeholder="ClaveProdServ" required>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-file"></i>
                        </span>
                        <input type="text" class="form-control input-lg" name="nuevaUmed" placeholder="UMED" required>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-dollar"></i>
                        </span>
                        <input type="text" class="form-control input-lg" name="nuevaMoneda" placeholder="Moneda" value="MXN" required>
                    </div>
                </div>
              </div>
            <div clasS="form-group">
                <div class="panel"><h4>SUBIR IMAGEN</h4></div>
                <input type="file" class="nuevaImagen" name="nuevaImagen">
                <p class="help-block">Tamaño Maximo de la foto 2Mb</p>
                <img src="img/productos/producto.png" class="img-thumbnail previsualizar" width="100px">
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
      {php}

        $crearProducto = new ControladorProductos();
        $crearProducto->ctrCrearProducto();

      {/php}
    </div>
  </div>
</div>

{*// =============================================================================
// Modal Editar Producto
// =============================================================================*}

<!-- Modal Agregar Producto -->

<div id="modalEditarProducto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post" enctype="multipart/form-data">
    {* // =========================================================================
    // cabecera Modal
    // ========================================================================= *}
      <div class="modal-header" style="background:#3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Producto</h4>
      </div>

      {* // =======================================================================
      // Cuerpo del Modal
      // ======================================================================= *}
      <div class="modal-body">
        <div class="box-body">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-folder"></i>
                    </span>
                    <select class="form-control input-lg" name="editarCategoria" readonly>
                    <option  id="editarCategoria"></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-barcode"></i>
                    </span>
                    <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-tags"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion">
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-cube"></i>
                    </span>
                    <input type="number" min="0" class="form-control input-lg" name="editarStock" id="editarStock">
                </div>
            </div>

{*
// =============================================================================
// Inputs de precio de compra y venta
// =============================================================================
*}
            <div class="form-group row">
                <div class="col-xs-12 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-shopping-cart"></i>
                        </span>
                        <input type="number" min="0" step="any" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-shopping-basket"></i>
                        </span>
                        <input type="number" min="0" step="any" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" readonly>
                    </div>
              
                <br>
                {* // ==========================================================
                   // Checkbox para porcentaje
                   // ========================================================== *}
                <div class="col-xs-12 col-sm-6">
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
                   <div class="col-xs-12 col-sm-6" style="padding:0">
                        <div class="input-group">
                            <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="35" required>
                            <span class="input-group-addon">
                                <i class="fa fa-percent"></i>
                            </span>
                        </div>
                   </div>
                 </div>
             </div>
            

            {*// ===============================================================
              // Clave Producto Servicio + UMED
              // ===============================================================*}
            <div class="form-group row">
                <div class="col-xs-12 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-code"></i>
                        </span>
                        <input type="number" class="form-control input-lg" name="editarClaveProdServ" id="editarClaveProdServ" required>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-file"></i>
                        </span>
                        <input type="text" class="form-control input-lg" name="editarUmed" id="editarUmed" required>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-dollar"></i>
                        </span>
                        <input type="text" class="form-control input-lg" name="editarMoneda" id="editarMoneda" required>
                    </div>
                </div>
              </div>
            <div clasS="form-group">
                <div class="panel"><h4>SUBIR IMAGEN</h4></div>
                <input type="file" class="nuevaImagen" name="editarImagen">
                <p class="help-block">Tamaño Maximo de la foto 2Mb</p>
                <img src="img/productos/producto.png" class="img-thumbnail previsualizar" width="100px">
                <input type="hidden" name="imagenActual" id="imagenActual">
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
      {php}

            $editarProducto = new ControladorProductos();
            $editarProducto->ctrEditarProducto(); 

      {/php}
    </div>
  </div>
</div>

 {php}

    $eliminarProducto = new ControladorProductos();
    $eliminarProducto->ctrEliminarProducto(); 

{/php}