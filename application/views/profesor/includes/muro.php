<div class="row-fluid bloquePegadoUp">
	<div class="">
		<h4 class="text-success"><i class="icon-puzzle-piece icon-large"></i>
			<?php echo ' Nombre de Materia'//$ProfesorFromClase['nombre']; //nombre profesor ?></h4>
	</div>
</div>

<div class="row-fluid bloquePegadoDown">
	<div class="tabbable">

		<ul class="nav nav-tabs">
		 	<li class=""><a href="#contenido" data-toggle="tab">Contenido</a></li>
			<li class=""><a href="#foro" data-toggle="tab">Foro</a></li>
			<li class=""><a href="#estudiantes" data-toggle="tab">Estudiantes</a></li>
			<li class=""><a href="#trabajos" data-toggle="tab">Trabajos</a></li>
			<li class="active"><a href="#notas" data-toggle="tab">Notas</a></li>
		</ul>

		<div class="tab-content">

			<div class="tab-pane" id="contenido">
				<?php $this->load->view('templates/writer') ?>
			</div>

			<div class="tab-pane" id="foro">
				<div class="bloque-top">

					<?php echo form_open('', array('class' => 'form-horizontal')) ?>
								
						<div class="control-group">
							<p Class="muted"><i class="icon-pencil icon-2x"></i><span> Crea un nuevo foro de discución</span></p>				
							<textarea name="tituloforo" id="tituloforo" required class="textprincipal input-block-level text-info fontSize3 bordersize1" cols="30" rows="1" placeholder="Escribe un titulo o idea principal..."></textarea>
						</div>

						<div class="control-group">
							<textarea name="cuerpoforo" id="cuerpoforo" class="input-block-level fontSize3 bordersize1" cols="30" rows="5" placeholder="Desarrolla la pregunta.."></textarea>	
						</div>

						<div class="btn-group btn-foro" id="">
							<button id="enviarforo" class="btn btn-primary btn-large" type="submit"><i class="icon-ok icon-white"></i> Enviar</button>
							<button id="" class="btn btn-large cancelarforo" type="reset"><i class="icon-remove"></i></button>
						</div>		
									
					</form>

					<?php // carga la lista de los temas de los foros
					$this->load->view('profesor/includes/foro'); ?>

				</div>
			</div>

			<div class="tab-pane" id="estudiantes">
				<?php $this->load->view('estudiante/listaEstudiantes'); ?>
			</div>

			<div class="tab-pane" id="trabajos">
				<?php $this->load->view('estudiante/includes/trabajos'); ?>
			</div>

			<div class="tab-pane active" id="notas">
				<?php // Carga el bloque de las tablas para configurar y calificar
				$this->load->view('profesor/includes/notas') ?>
			</div>
		</div>
	</div>
</div>