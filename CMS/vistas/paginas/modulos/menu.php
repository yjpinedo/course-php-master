<div class="container-fluid menu">
	<a href="#" class="btnClose">X</a>
	<ul class="nav flex-column text-center">
		<?php foreach ($categorias as $categoria): ?>
			<li class="nav-item">
				<a class="nav-link text-white" href="<?= $categoria['ruta']?>"><?= $categoria['descripcion']?></a>
			</li>
		<?php endforeach ?>
	</ul>
</div>