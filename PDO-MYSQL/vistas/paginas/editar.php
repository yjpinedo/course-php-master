<?php
if (isset($_GET['token'])) {
    $usuario = FormularioControlador::obtenerRegistro('token', $_GET['token']);
}
?>

<div class="d-flex justify-content-center">
    <form class="p-5 bg-light" method="POST">
        <input type="hidden" value="<?=$usuario['token'];?>" name="token">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?=$usuario['nombre'];?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                </div>
                <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" value="<?=$usuario['correo'];?>">
            </div>
        </div>
        <button type="submit" class="btn btn-secondary btn-block">Actualizar <i class="fas fa-pen-square"></i></button>
        <?php
        $actualizar = FormularioControlador::actuaizar();
        if ($actualizar == 'ok') {
            echo
            '<script>
                if(window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>';
            echo
            '<div class="alert alert-success text-center" role="alert">Datos actualizados con éxito!</div>';
            echo
            '<script>
                setTimeout(function(){
                    window.location = "index.php?pagina=inicio";
                }, 3000);
            </script>';
        }
        if ($actualizar == 'error') {
            '<script>
                if(window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>';
            echo
            '<div class="alert alert-danger text-center" role="alert">Error al actualizar los datos</div>';
        }

        if ($actualizar == 'nombre') {
            echo
            '<script>
                if(window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>';
            echo
            '<div class="alert alert-danger text-center" role="alert">
                Error nombre!
              </div>';
        }

        if ($actualizar == 'correo') {
            echo
            '<script>
                if(window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>';
            echo
            '<div class="alert alert-danger text-center" role="alert">
                Error correo!
              </div>';
        }
        ?>
    </form>

</div>