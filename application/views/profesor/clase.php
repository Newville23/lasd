<div class="container" style="width: 95%; margin-top: 5%;padding-right: 15px; padding-left: 1%; margin-right: auto; margin-left: 1%;">

	<div class="row">
		
		<div class="col-md-4 margen-top" id="menu">

			<div class="row">

				<div class="fontSize2 margen">
					<?php //$this->load->view('profesor/includes/menu'); ?>
				</div>

				<div class="col-md-6 padding1 margen" id="materias2">
					<?php // Carga la lista de cursos que da el profesor
					$this->load->view('profesor/includes/menu-curso'); ?>
				</div>
			</div>
		</div>
		
		<div class="col-md-8 padding2 well-margin-botton">
			<?php // Carga el muro, cuadro principal donde se despliegan varias tareas (foro, trabajos...)
			$this->load->view('profesor/includes/muro'); ?>
		</div>
		
	</div>
</div>

<!-- --------------------------------------  Modal del foro  --------------------------------------------------- -->

<!-- 	<div id="myModal" class="modal hide modal-correccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large text-error"></i></button>
			  <p id="myModalLabel" class="text-muted">Foro de discución de la materia</p>
		</div>
		<div class="modal-body" id="cuerpoModalDelForo">
		</div>
		<div class="modal-footer">
			  
		</div>
	</div> -->

<div class="modal cuerpoModalDelForo" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div><!-- /.modal -->
