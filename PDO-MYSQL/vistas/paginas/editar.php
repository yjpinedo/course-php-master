<?php
if (isset($_GET['id'])) {
    $usuario = FormularioControlador::obtenerRegistro('id', $_GET['id']);
}
?>

<div class="d-flex justify-content-center">
    <form class="p-5 bg-light" method="POST">
        <input type="hidden" value="<?=$usuario['id'];?>" name="id">
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
        ?>
    </form>

</div>