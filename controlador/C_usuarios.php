<?php

class ControladorUsuarios
{

    // =========================================================================
    // Ingreso de usuario
    // =========================================================================

    static public function ctrIngresoUsuario()
    {
        if (isset($_POST['ingUsuario'])) {

            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingUsuario']) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingPassword'])) {

                $cryptPass = crypt($_POST['ingPassword'], '0F08A861C7C3E73C25344FB7C8688324');
                $tabla = 'usuarios';


                $item = 'usuario';
                $valor = $_POST['ingUsuario'];


                $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
                if ($respuesta['estado'] == 1) {
                    if ($respuesta['usuario'] == $_POST['ingUsuario'] && $respuesta['password'] == $cryptPass) {

                        $_SESSION['iniciarSesion'] = 'ok';
                        $_SESSION['id'] = $respuesta['id'];
                        $_SESSION['nombre'] = $respuesta['nombre'];
                        $_SESSION['usuario'] = $respuesta['usuario'];
                        $_SESSION['foto'] = $respuesta['foto'];
                        $_SESSION['perfil'] = $respuesta['perfil'];

                // =============================================================================
                // registrar fecha y hora para saber el ultimo login
                // =============================================================================

                        date_default_timezone_set('America/Mexico_City');
                        $fecha = date('Y-m-d');
                        $hora = date('H:i:s');
                        $fechaActual = $fecha . ' ' . $hora;

                        $item1 = 'ultimo_login';
                        $valor1 = $fechaActual;
                        $item2 = 'id';
                        $valor2 = $respuesta['id'];

                        $ultimoLogin = ModeloUsuarios::MdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

                        if ($ultimoLogin == 'ok') {

                            echo '<script> window.location = "dashboard"; </script>';
                        }

                    } else {
                        echo '<br><div class="alert alert-danger">Error de usuario o contraseña</div>';
                    }
                // var_dump($respuesta);
                } else {
                    echo '<br><div class="alert alert-danger text-center">Usuario desactivado</div>';
                }
            }

        }
    }
    
    // =============================================================================
    // Registro Usuario
    // =============================================================================

    static public function ctrCrearUsuario()
    {
        if (isset($_POST['nuevoUsuario'])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nuevoNombre']) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST['nuevoUsuario']) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST['nuevoPassword'])) {

                $ruta = '';
                    // var_dump($_FILES);
                if (isset($_FILES['nuevaFoto']['tmp_name'])) {

                    list($ancho, $alto) = getimagesize($_FILES['nuevaFoto']['tmp_name']);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    // =========================================================
                    // Creamos directorio a guardar la foto
                    // =========================================================

                    $directorio = 'img/usuarios/' . $_POST['nuevoUsuario'];

                    mkdir($directorio, 0755, true);

                    // =========================================================
                    // funciones para imagenes, por defecto JPG
                    // =========================================================

                    if ($_FILES['nuevaFoto']['type'] == 'image/jpeg') {

                        $random = mt_rand(100, 999);
                        $ruta = 'img/usuarios/' . $_POST['nuevoUsuario'] . '/' . $random . '.jpg';
                        $origen = imagecreatefromjpeg($_FILES['nuevaFoto']['tmp_name']);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES['nuevaFoto']['type'] == 'image/png') {

                        $random = mt_rand(100, 999);
                        $ruta = 'img/usuarios/' . $_POST['nuevoUsuario'] . '/' . $random . '.png';
                        $origen = imagecreatefrompng($_FILES['nuevaFoto']['tmp_name']);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "usuarios";

                $cryptPass = crypt($_POST['nuevoPassword'], '0F08A861C7C3E73C25344FB7C8688324');

                $datos = array(
                    'nombre' => $_POST['nuevoNombre'],
                    'usuario' => $_POST['nuevoUsuario'],
                    'password' => $cryptPass,
                    'perfil' => $_POST['nuevoPerfil'],
                    'foto' => $ruta
                );

                $respuesta = ModeloUsuarios::MdlIngresaUsuarios($tabla, $datos);
                if ($respuesta == 'ok') {
                    echo '
                    <script>
                    swal({
                        type: "success",
                        title: "El Usuario ha sido guardado.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result)=>{
                        
                        if(result.value){
                            window.location = "usuarios";
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
                        title: "El Usuario no puede ir vacio o llevar caracteres especiales",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result)=>{
                        
                        if(result.value){
                            window.location = "usuarios";
                        }

                    });
                </script>
                ';
            }
        }
    }
    public static function ctrMostraUsuarios($item, $valor)
    {
        $tabla = 'usuarios';

        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrEditarUsuario()
    {
        if (isset($_POST['editarUsuario'])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editarNombre'])) {

                // =============================================================
                // validar Imagen
                // =============================================================

                $ruta = $_POST['fotoActual'];

                if (isset($_FILES['editarFoto']['tmp_name']) && !empty($_FILES['editarFoto']['tmp_name'])) {

                    list($ancho, $alto) = getimagesize($_FILES['editarFoto']['tmp_name']);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    // =========================================================
                    // Creamos directorio a guardar la foto
                    // =========================================================

                    $directorio = 'img/usuarios/' . $_POST['editarUsuario'];

                    // =========================================================
                    // validar si existe la foto
                    // =========================================================

                    if (!empty($_POST['fotoActual'])) {

                        unlink($_POST['fotoActual']);

                    } else {

                        mkdir($directorio, 0755, true);
                    }

                    

                    // =========================================================
                    // funciones para imagenes, por defecto JPG
                    // =========================================================

                    if ($_FILES['editarFoto']['type'] == 'image/jpeg') {

                        $random = mt_rand(100, 999);
                        $ruta = 'img/usuarios/' . $_POST['editarUsuario'] . '/' . $random . '.jpg';
                        $origen = imagecreatefromjpeg($_FILES['editarFoto']['tmp_name']);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES['editarFoto']['type'] == 'image/png') {

                        $random = mt_rand(100, 999);
                        $ruta = 'img/usuarios/' . $_POST['editarUsuario'] . '/' . $random . '.png';
                        $origen = imagecreatefrompng($_FILES['editarFoto']['tmp_name']);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }
                }



                if ($_POST['editarPassword'] != null) {

                    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['nuevoPassword'])) {

                        $cryptPass = crypt($_POST['nuevoPassword'], '0F08A861C7C3E73C25344FB7C8688324');

                    } else {
                        echo '
                        <script>
                            swal({
                                type: "error",
                                title: "La contraseña no puede llevar caracteres especiales e estar vacia",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                            }).then((result)=>{
                                
                                if(result.value){
                                    window.location = "usuarios";
                                }
        
                            });
                        </script>
                        ';
                    }
                } else {

                    $cryptPass = $_POST['passwordActual'];
                }

                $tabla = 'usuarios';
                $datos = array(
                    'nombre' => $_POST['editarNombre'],
                    'usuario' => $_POST['editarUsuario'],
                    'password' => $cryptPass,
                    'perfil' => $_POST['editarPerfil'],
                    'foto' => $ruta
                );

                $respuesta = ModeloUsuarios::MdlEditarUsuario($tabla, $datos);

                if ($respuesta == 'ok') {

                    echo '
                    <script>
                    swal({
                        type: "success",
                        title: "El Usuario ha sido guardado.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result)=>{
                        
                        if(result.value){
                            window.location = "usuarios";
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
                                title: "El nombre no puede llevar caracteres especiales e estar vacio",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                            }).then((result)=>{
                                
                                if(result.value){
                                    window.location = "usuarios";
                                }
        
                            });
                        </script>
                        ';
            }
        }
    }

    // =========================================================================
    // Borrar Usuario
    // =========================================================================
    public static function ctrEliminarUsuario()
    {
        if (isset($_GET['idUsuario'])) {

            $tabla = 'usuarios';
            $datos = $_GET['idUsuario'];

            if ($_GET['fotoUsuario'] != "") {
                unlink($_GET['fotoUsuario']);
                rmdir('img/usuarios/' . $_GET['usuario']);
            }

            $respuesta = ModeloUsuarios::MdlBorrarUsuario($tabla, $datos);
            if ($respuesta == 'ok') {

                echo '
                    <script>
                    swal({
                        type: "success",
                        title: "El Usuario ha sido eliminado.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result)=>{
                        
                        if(result.value){
                            window.location = "usuarios";
                        }

                    });
                    </script>
                    ';
            }
        }
    }
}