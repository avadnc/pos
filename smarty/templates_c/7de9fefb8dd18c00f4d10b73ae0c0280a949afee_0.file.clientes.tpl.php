<?php
/* Smarty version 3.1.34-dev-5, created on 2018-11-24 01:54:39
  from '/var/www/html/pos/smarty/templates/modulos/clientes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-5',
  'unifunc' => 'content_5bf8af5f8fa887_37808594',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7de9fefb8dd18c00f4d10b73ae0c0280a949afee' => 
    array (
      0 => '/var/www/html/pos/smarty/templates/modulos/clientes.tpl',
      1 => 1543024476,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf8af5f8fa887_37808594 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrar 
            <small>Clientes</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Administrar Clientes</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
               Agregar Cliente
               </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Razón Social</th>
                            <th>R.F.C.</th>
                            <th>Direccion</th>
                            <th>Municipio</th>
                            <th>Estado</th>
                            <th>Código Postal</th>
                            <th>Correo Electrónico</th>
                            <th>Teléfono</th>
                            <th>Celular</th>
                            <th>Total Compras</th>
                            <th>Última Compra</th>
                            <th>Fecha de Alta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                            <td>1</td>
                            <td>Alex Vives Alcazar</td>
                            <td>VIAA810823QH4</td>
                            <td>Isla Tobago #2927 Col. Jardines de la Cruz</td>
                            <td>Guadalajara</td>
                            <td>Jalisco</td>
                            <td>44950</td>
                            <td>gerencia@vivescloud.com</td>
                            <td>3384211125</td>
                            <td>3317025248</td>
                            <td>20</td>
                            <td>23-08-2018</td>
                            <td>02-01-2018</td>
                            <td><div class="btn-group">

                                    <button class="btn btn-warning btnEditarCategoria" data-toggle="modal" data-target="#modalEditarCliente">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button class="btn btn-danger btnEliminarCategoria">
                                        <i class="fa fa-times"></i>
                                    </button>
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

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post">
          <div class="modal-header" style="background:#3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Cliente</h4>
      </div>

            <div class="modal-body">
        <div class="box-body">
         
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-users"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Razon Social">
                </div>
            </div>
    
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-file-text-o"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="nuevoRfc" placeholder="RFC">
                </div>
            </div>
    
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-map-o"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Domicilio">
                </div>
            </div>
     
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-institution"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="nuevoMunicipio" placeholder="Municipio">
                </div>
            </div>
     
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-map-signs"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="nuevoEstado" placeholder="Estado">
                </div>
            </div>
     
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-map-marker"></i>
                    </span>
                    <input type="number" min="0" class="form-control input-lg" name="nuevoCodigoPostal" placeholder="Código Postal">
                </div>
            </div> 
     
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-envelope-o"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="nuevoEmail" placeholder="Correo Electrónico">
                </div>
            </div>
     
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Telefono">
                </div>
            </div>
     
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-whatsapp"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="nuevoCelular" placeholder="Celular">
                </div>
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
</div>

<!-- Modal Editar Categoria -->

<div id="modalEditarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post" enctype="multipart/form-data">
             <div class="modal-header" style="background:#3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Cliente</h4>
      </div>

            <div class="modal-body">
        <div class="box-body">
         
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-users"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="editarCliente">
                </div>
            </div>
    
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-file-text-o"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="editarRfc">
                </div>
            </div>
    
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-map-o"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="editarDireccion">
                </div>
            </div>
     
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-institution"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="editarMunicipio">
                </div>
            </div>
     
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                       <i class="fa fa-map-signs"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="editarEstado">
                </div>
            </div>
     
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-map-marker"></i>
                    </span>
                    <input type="number" min="0" class="form-control input-lg" name="editarCodigoPostal">
                </div>
            </div> 
     
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-envelope-o"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="editarEmail">
                </div>
            </div>
     
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                       <i class="fa fa-phone"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="editarTelefono">
                </div>
            </div>
     
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-whatsapp"></i>
                    </span>
                    <input type="text" class="form-control input-lg" name="editarCelular">
                </div>
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
</div>
<?php }
}
