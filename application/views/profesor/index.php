<div class="container container2">
	<div class="row">

		<div class="col-md-3 col-md-offset-1 fontSize3" id="menu">

			<?php $this->load->view('profesor/includes/menu'); ?>

		</div>

		<div class="col-md-6 col-md-offset-1" id="">
			<div class="row">
				<?php foreach ($clase as $value): ?>
				<a class="Matbar2" href="<?php echo site_url("profesor/clase/" . $value['numero']); ?>">
					<p><strong><span class="fontSize3"><?php echo $value['nombre_curso'] .'º '. $value['indice']; ?></span></strong><br>
					  <small><?php echo $value['nombre']; ?></small>
					</p>
				</a>
				<?php endforeach; ?>
			</div>
		</div>

	</div>
</div>