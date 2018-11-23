<?php

class ControladorProductos
{

// =============================================================================
// Mostrar Productos
// =============================================================================

    static public function ctrMostrarProductos($item,$valor)
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
        if(isset($_POST['nuevaDescripcion'])){

           
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST['nuevaDescripcion']) &&
                preg_match('/^[0-9]+$/', $_POST['nuevoStock']) &&
                preg_match('/^[0-9-.,]+$/', $_POST['nuevoPrecioCompra']) &&
                preg_match('/^[0-9-.,]+$/', $_POST['nuevoPrecioVenta']) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST['nuevoCodigo'])) {

                    $ruta = '';

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
                        'moneda' => $_POST['nuevaMoneda']
                    );

                   var_dump($datos);

                    $respuesta = ModeloProductos::mdlIngresarProducto($tabla,$datos);
                    
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
}