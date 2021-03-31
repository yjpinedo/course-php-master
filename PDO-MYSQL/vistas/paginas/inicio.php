<?php
$registros = FormularioControlador::obtenerRegistros();
?>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registros as $index => $registro) : ?>
                <tr>
                    <td><?= ($index+1) ?></td>
                    <td><?= $registro['nombre'] ?></td>
                    <td><?= $registro['correo'] ?></td>
                    <td><?= date('d/m/Y', strtotime($registro['fecha'])) ?></td>
                    <td>
                        <div class="btn btn-group">
                            <button class="btn btn-outline-info btn-sm"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>