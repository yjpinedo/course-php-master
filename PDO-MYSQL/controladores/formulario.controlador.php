<?php

class FormularioControlador
{
    public static function registro()
    {
        if (isset($_POST['nombre'])) {
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nombre'])) {
                if (preg_match('/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/', $_POST['correo'])) {
                    if (preg_match('/^[0-9a-zA-Z]+$/', $_POST['clave'])) {
                        $tabla = 'registros';
                        $token = md5($_POST['nombre'] . '+' . $_POST['correo']);
                        $datos = [
                            'nombre' => $_POST['nombre'],
                            'correo' => $_POST['correo'],
                            'clave'  => password_hash($_POST['clave'], PASSWORD_BCRYPT),
                            'token'  => $token,
                        ];

                        return Formulario::registro($tabla, $datos);
                    } else {
                        return 'clave';
                    }
                } else {
                    return 'correo';
                }
            } else {
                return 'nombre';
            }
        }
    }

    public static function obtenerRegistros()
    {
        $registros = Formulario::obtenerRegistros('registros');
        return $registros;
    }

    public static function obtenerRegistro($item, $valor)
    {
        $registro = Formulario::obtenerRegistro('registros', $item, $valor);
        return $registro;
    }

    public function ingreso()
    {
        if (isset($_POST['correo'])) {
            $registros = Formulario::ingreso('registros', 'correo', $_POST['correo']);
            if ($registros['correo'] == $_POST['correo'] && password_verify($_POST['clave'], $registros['clave'])) {
                $_SESSION['validarIngreso'] = 'ok';
                Formulario::actualizarIntentos('registros', [
                    'intentos' => 0,
                    'id'       => $registros['id'],
                ]);
                echo
                '<script>
                    if(window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location = "index.php?pagina=inicio";
                </script>';
            } else {
                if ($registros['intentos'] < 3) {
                    $intentos          = ($registros['intentos'] + 1);
                    Formulario::actualizarIntentos('registros', [
                        'intentos' => $intentos,
                        'id'       => $registros['id'],
                    ]);
                } else {
                    echo '<div class="alert alert-warning text-center" role="alert">RECAPTCHA Debes validar que no eres un robot</div>';
                }
                '<script>
                    if(window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>';
                echo
                '<div class="alert alert-danger text-center" role="alert">Error en el ingreso!</div>';
            }
        }
    }

    public static function actuaizar()
    {
        if (isset($_POST['nombre'])) {
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nombre'])) {
                if (preg_match('/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/', $_POST['correo'])) {
                    $tabla    = 'registros';
                    $registro = Formulario::obtenerRegistro("$tabla", 'token', $_POST['token']);
                    $token    = md5($registro['nombre'] . '+' . $registro['correo']);
                    if ($_POST['token'] == $token && $registro['id'] == $_POST['id']) {
                        $_token    = md5($_POST['nombre'] . '+' . $_POST['correo']);
                        $datos     = [
                            'nombre'    => $_POST['nombre'],
                            'correo'    => $_POST['correo'],
                            'token'     => $_token,
                            'id'        => $_POST['id'],
                        ];
                        $respuesta = Formulario::actualizar($tabla, $datos);
                    } else {
                        $respuesta = 'error';
                    }
                } else {
                    return 'correo';
                }
            } else {
                return 'nombre';
            }

            return $respuesta;
        }
    }

    public function eliminar()
    {
        if (isset($_POST['token'])) {
            $tabla    = 'registros';
            $registro = Formulario::obtenerRegistro("$tabla", 'token', $_POST['token']);
            $token    = md5($registro['nombre'] . '+' . $registro['correo']);
            if ($token == $_POST['token']) {
                $respuesta = Formulario::eliminar('registros', 'token', $_POST['token']);
                if ($respuesta == 'ok') {
                    echo
                '<script>
                    if(window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location = "index.php?pagina=inicio";
                </script>';
                }
            }
        }
    }
}
