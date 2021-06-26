<div class="d-block d-md-none redes redesMovil p-0 bg-white w-100 pt-2">
	<ul class="d-flex justify-content-center p-0">
		<?php $redes_sociales = json_decode($blog['redes_sociales'], true);  ?>
		<?php foreach ($redes_sociales as $redes) : ?>
			<li>
				<a href="<?= $redes['url'];?>" target="_blank">
					<i class="<?= $redes['icono'];?> lead rounded-circle text-white mr-3 mr-sm-4"></i>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>