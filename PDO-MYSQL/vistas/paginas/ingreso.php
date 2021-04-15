<div class="d-flex justify-content-center">
    <form class="p-5 bg-light" method="POST">
    <div class="form-group">
            <label for="correo">Correo Electrínico</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                </div>
                <input type="email" class="form-control" name="correo">
            </div>
        </div>
        <div class="form-group">
            <label for="clave">Contraseña</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                </div>
                <input type="password" class="form-control" name="clave">
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Inisiar Sesión </button>
        <?php
        $formulario = new FormularioControlador();
        $formulario->ingreso();
        if ($formulario == 'ok') {
            // Funcion para limpiar la cache del navegador
        }
        ?>
    </form>
</div>