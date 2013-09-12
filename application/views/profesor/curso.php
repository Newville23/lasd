<div class="container-fluid" style="margin-top: 5%;">

	<div class="row-fluid">
		
		<div class="span4 well bloque" id="menu">

			<div class="row-fluid">

				<div class="span7 fontSize2">
					<?php // Carga el menu principal para el profesor
					$this->load->view('profesor/includes/menu'); ?>
				</div>

				<div class="span5 padding1" id="materias2">
					<?php // Carga la lista de cursos que da el profesor
					$this->load->view('profesor/includes/menu-curso'); ?>
				</div>
			</div>
		</div>
		
		<div class="span8 padding2 well-margin-botton">
			<?php // Carga el muro, cuadro principal donde se despliegan varias tareas (foro, trabajos...)
			$this->load->view('profesor/includes/muro'); ?>
		</div>
		
	</div>
</div>

<!-- --------------------------------------  Modal del foro  --------------------------------------------------- -->

	<div id="myModal" class="modal hide modal-correccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large text-error"></i></button>
			  <p id="myModalLabel" class="muted">Foro de discución de la materia</p>
		</div>
		<div class="modal-body" id="cuerpoModalDelForo">
		</div>
		<div class="modal-footer">
			  
		</div>
	</div>
