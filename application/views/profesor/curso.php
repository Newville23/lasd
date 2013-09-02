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