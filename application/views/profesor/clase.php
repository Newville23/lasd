<div class="container" style="">

	<div class="row">
		
		<div class="col-md-3" id="menu">

			<div class="row">

				<div class="fontSize2 margen">
					<?php //$this->load->view('profesor/includes/menu'); ?>
				</div>

				<div class="col-md-8 padding1 margen" id="materias2">
					<?php // Carga la lista de cursos que da el profesor
					$this->load->view('profesor/includes/menu-curso'); ?>
				</div>
			</div>
		</div>
		
		<div class="col-md-9 well-margin-botton">
			<div class="row">
				<?php // Carga el muro, cuadro principal donde se despliegan varias tareas (foro, trabajos...)
				$this->load->view('profesor/includes/muro'); ?>
			</div>
		</div>
		
	</div>
</div>

<!-- --------------------------------------  Modal del foro  --------------------------------------------------- -->

<div class="modal cuerpoModalDelForo" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div><!-- /.modal -->
