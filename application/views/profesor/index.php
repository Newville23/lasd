<div class="container-fluid container-fluid2">
	<div class="row-fluid">

		<div class="span3 offset2 well fontSize3" id="menu">

			<?php $this->load->view('profesor/includes/menu'); ?>

		</div>

		<div class="span6 well" id="">
			<div class="row-fluid">
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