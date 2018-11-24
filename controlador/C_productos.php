<?php

class ControladorProductos
{

// =============================================================================
// Mostrar Productos
// =============================================================================

    static public function ctrMostrarProductos($item, $valor)
    {
        $tabla = 'productos';

        $respuesta = ModeloProductos::MdlMostrarProductos($tabla, $item, $valor);

        return $respuesta;
    }

// =============================================================================
// Crear Producto
// =============================================================================

    public static function ctrCrearProducto()
    {
        if (isset($_POST['nuevaDescripcion'])) {


            // if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nuevaDescripcion']) &&
            if (preg_match('/^[0-9]+$/', $_POST['nuevoStock']) &&
                preg_match('/^[0-9-.,]+$/', $_POST['nuevoPrecioCompra']) &&
                preg_match('/^[0-9-.,]+$/', $_POST['nuevoPrecioVenta'])) {
                // preg_match('/^[a-zA-Z0-9-_\/\"]+$/', $_POST['nuevoCodigo'])

                $ruta = '';

                if ($_POST['nuevaMoneda'] == null || $_POST['nuevaMoneda'] == '') {

                    $moneda = 'MXN';

                } else {

                    $moneda = $_POST['nuevaMoneda'];

                }
                    // =========================================================
                    // validar imagen
                    // =========================================================
                if (isset($_FILES['nuevaImagen']['tmp_name'])) {

                    list($ancho, $alto) = getimagesize($_FILES['nuevaImagen']['tmp_name']);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
    
                        // =========================================================
                        // Creamos directorio a guardar la foto
                        // =========================================================

                    $directorio = 'img/productos/' . $_POST['nuevoCodigo'];

                    mkdir($directorio, 0755, true);
    
                        // =========================================================
                        // funciones para imagenes, por defecto JPG
                        // =========================================================

                    if ($_FILES['nuevaImagen']['type'] == 'image/jpeg') {

                        $random = mt_rand(100, 999);
                        $ruta = 'img/productos/' . $_POST['nuevoCodigo'] . '/' . $random . '.jpg';
                        $origen = imagecreatefromjpeg($_FILES['nuevaImagen']['tmp_name']);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES['nuevaImagen']['type'] == 'image/png') {

                        $random = mt_rand(100, 999);
                        $ruta = 'img/productos/' . $_POST['nuevoCodigo'] . '/' . $random . '.png';
                        $origen = imagecreatefrompng($_FILES['nuevaImagen']['tmp_name']);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }
                }


                $tabla = 'productos';
                $datos = array(
                    'id_categoria' => $_POST['nuevaCategoria'],
                    'codigo' => $_POST['nuevoCodigo'],
                    'descripcion' => $_POST['nuevaDescripcion'],
                    'stock' => intval($_POST['nuevoStock']),
                    'precio_compra' => floatval($_POST['nuevoPrecioCompra']),
                    'precio_venta' => floatval($_POST['nuevoPrecioVenta']),
                    'imagen' => $ruta,
                    'claveprodserv' => $_POST['nuevaClaveProdServ'],
                    'umed' => $_POST['nuevaUmed'],
                    'moneda' => $moneda
                );

                var_dump($datos);

                $respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);

                if ($respuesta == 'ok') {

                    echo '
                        <script>
                        swal({
                            type: "success",
                            title: "El Producto ha sido guardado.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            
                            if(result.value){
                                window.location = "productos";
                            }
    
                        });
                        </script>
                        ';
                }

            } else {

                echo '
                    <script>
                        swal({
                            type: "error",
                            title: "El Prodcuto no puede contener campos vacios",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            
                            if(result.value){
                                window.location = "productos";
                            }
    
                        });
                    </script>
                    ';

            }

        }
    }

    static public function ctrEditarProducto()
    {
        if (isset($_POST['editarDescripcion'])) {


            //*
            //Revisar PregMatch para codigo y descripción


            if (preg_match('/^[0-9]+$/', $_POST['editarStock']) &&
                preg_match('/^[0-9-.,]+$/', $_POST['editarPrecioCompra']) &&
                preg_match('/^[0-9-.,]+$/', $_POST['editarPrecioVenta'])) {


                $ruta = $_POST['imagenActual'];

                    // =========================================================
                    // validar imagen
                    // =========================================================
                if (isset($_FILES['editarImagen']['tmp_name']) && !empty($_FILES['editarImagen']['tmp_name'])) {

                    list($ancho, $alto) = getimagesize($_FILES['editarImagen']['tmp_name']);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
    
                        // =========================================================
                        // Creamos directorio a guardar la foto
                        // =========================================================

                    $directorio = 'img/productos/' . $_POST['editarCodigo'];

                        // =====================================================
                        // existe otra imagen en la bd
                        // =====================================================

                    if (!empty($_POST['imagenActual']) && $_POST['imagenActual'] != 'img/productos/producto.png') {

                        unlink($_POST['imagenActual']);

                    } else {

                        mkdir($directorio, 0755, true);

                    }                       
    
                        // =========================================================
                        // funciones para imagenes, por defecto JPG
                        // =========================================================

                    if ($_FILES['editarImagen']['type'] == 'image/jpeg') {

                        $random = mt_rand(100, 999);
                        $ruta = 'img/productos/' . $_POST['editarCodigo'] . '/' . $random . '.jpg';
                        $origen = imagecreatefromjpeg($_FILES['editarImagen']['tmp_name']);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES['editarImagen']['type'] == 'image/png') {

                        $random = mt_rand(100, 999);
                        $ruta = 'img/productos/' . $_POST['editarCodigo'] . '/' . $random . '.png';
                        $origen = imagecreatefrompng($_FILES['editarImagen']['tmp_name']);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }
                }


                $tabla = 'productos';
                $datos = array(
                    'id_categoria' => $_POST['editarCategoria'],
                    'codigo' => $_POST['editarCodigo'],
                    'descripcion' => $_POST['editarDescripcion'],
                    'stock' => intval($_POST['editarStock']),
                    'precio_compra' => floatval($_POST['editarPrecioCompra']),
                    'precio_venta' => floatval($_POST['editarPrecioVenta']),
                    'imagen' => $ruta,
                    'claveprodserv' => $_POST['editarClaveProdServ'],
                    'umed' => $_POST['editarUmed'],
                    'moneda' => $_POST['editarMoneda']
                );

                var_dump($datos);

                $respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);

                if ($respuesta == 'ok') {

                    echo '
                        <script>
                        swal({
                            type: "success",
                            title: "El Producto ha sido editado.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            
                            if(result.value){
                                window.location = "productos";
                            }
    
                        });
                        </script>
                        ';
                }

            } else {

                echo '
                    <script>
                        swal({
                            type: "error",
                            title: "El Prodcuto no puede contener campos vacios",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            
                            if(result.value){
                                window.location = "productos";
                            }
    
                        });
                    </script>
                    ';

            }

        }
    }

    // =========================================================================
    // Borrar Producto
    // =========================================================================
    public static function ctrEliminarProducto()
    {

        if (isset($_GET['idProducto'])) {

            $tabla = 'productos';
            $datos = $_GET['idProducto'];

            if ($_GET['imagen'] != '' && $_GET['imagen'] != 'img/productos/producto.png') {

                unlink($_GET['imagen']);
                rmdir('img/productos/' . $_GET['codigo']);
            }

            $respuesta = ModeloProductos::mdlEliminarProducto($tabla, $datos);

            if ($respuesta == 'ok') {

                echo '
                    <script>
                    swal({
                        type: "success",
                        title: "El Producto ha sido eliminado correctamente.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result)=>{
                        
                        if(result.value){
                            window.location = "productos";
                        }

                    });
                    </script>
                    ';
            }
        }
    }
}