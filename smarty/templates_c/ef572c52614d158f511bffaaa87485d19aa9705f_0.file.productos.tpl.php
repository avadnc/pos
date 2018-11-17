<?php
/* Smarty version 3.1.34-dev-5, created on 2018-11-17 04:54:13
  from '/var/www/html/pos/smarty/templates/modulos/productos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-5',
  'unifunc' => 'content_5bef9ef5426440_34154636',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef572c52614d158f511bffaaa87485d19aa9705f' => 
    array (
      0 => '/var/www/html/pos/smarty/templates/modulos/productos.tpl',
      1 => 1542430450,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bef9ef5426440_34154636 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Content Wrapper. Contains page content -->
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
                            <th>Marca</th>
                            <th>Categoria</th>
                            <th>Stock</th>
                            <th>Precio Compra</th>
                            <th>Precio Venta</th>
                            <th>Moneda</th>
                            <th>ClaveProdServ</th>
                            <th>Unidad de Medida</th>
                            <th>Agregado en:</th>
                            <th>Acciones</th>


                        </tr>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
</td>
                            <td>
                            <?php if ($_smarty_tpl->tpl_vars['i']->value['imagen'] == '') {?>
                                <img src="img/productos/producto.png" class="img-thumbnail" width="40px" >    
                            <?php } else { ?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['i']->value['imagen'];?>
" class="img-thumbnail" width="40px" >    
                            <?php }?>
                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value['codigo'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value['descripcion'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value['marca'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value['id_categoria'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value['stock'];?>
</td>
                            <td>$<?php echo $_smarty_tpl->tpl_vars['i']->value['precio_compra'];?>
</td>
                            <td>$<?php echo $_smarty_tpl->tpl_vars['i']->value['precio_venta'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value['moneda'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value['claveprodserv'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value['umed'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value['fecha'];?>
</td>
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

<div id="modalAgregarProducto" class="modal fade" role="dialog">
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
                                <div class="col-xs-6">
                    <div class="form-group">
                        <label>
                            <input type="checkbox" class="minimal porcentaje" checked>
                            Utilizar Porcentaje %
                        </label>
                    </div>
                </div>
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
            <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>   
      </form>
    </div>
  </div>
</div><?php }
}
