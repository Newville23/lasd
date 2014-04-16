<div class="row bloquePegadoUp">
	<div class="">
		<h4 class="text-success"><i class="icon-puzzle-piece icon-large"></i>
			<?php echo ' Nombre de Materia'//$ProfesorFromClase['nombre']; //nombre profesor ?></h4>
	</div>
</div>

<div class="row bloquePegadoDown">
	<div class="tabbable">

		<ul class="nav nav-tabs nav-justified">
		 	<li class=""><a href="#contenido" data-toggle="tab">Contenido</a></li>
			<li class="active"><a href="#foro" data-toggle="tab">Foro</a></li>
			<li class=""><a href="#estudiantes" data-toggle="tab">Estudiantes</a></li>
			<li class=""><a href="#trabajos" data-toggle="tab">Trabajos</a></li>
			<li class=""><a href="#notas" data-toggle="tab">Notas</a></li>
		</ul>

		<div class="tab-content">

			<div class="tab-pane" id="contenido">
				<?php $this->load->view('templates/writer') ?>
			</div>

			<div class="tab-pane active" id="foro">
				<div class="margen-top">

					<?php echo form_open('', array('class' => 'well2')) ?>
								
						<div class="form-group">
							<p Class="text-muted"><i class="icon-pencil icon-2x"></i><span> Crea un nuevo foro de discución</span></p>				
							<textarea name="tituloforo" id="tituloforo" required class="form-control textprincipal text-primary fontSize3" cols="30" rows="2" placeholder="Escribe un titulo o idea principal..."></textarea>
						</div>

						<div class="form-group">
							<textarea name="cuerpoforo" id="cuerpoforo" class="form-control fontSize3" cols="30" rows="5" placeholder="Desarrolla la pregunta.."></textarea>	
						</div>

						<div class="btn-group btn-foro" id="">
							<button id="enviarforo" class="btn btn-primary btn-lg" type="submit"><i class="icon-ok icon-white"></i> Enviar</button>
							<button id="" class="btn btn-default btn-lg cancelarforo" type="reset"><i class="icon-remove"></i></button>
						</div>		
									
					</form>

					<?php // carga la lista de los temas de los foros
						$this->load->view('profesor/includes/foro'); ?>

				</div>
			</div>

			<div class="tab-pane" id="estudiantes" style="margin-top: 20px;">
				
				<div class="tabbable">

					<ul class="nav nav-pills">
					 	<li class=""><a href="#asistencia" class="btn btn-default" data-toggle="tab">Lista de Asistencia</a></li>
						<li class="active"><a href="#listaEstudiantes" class="btn btn-default" data-toggle="tab">Estudiantes</a></li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane" id="asistencia">
							<div class="col-md-12" style="margin-top: 10px;">
								 <div class="row">
								    <div id="datepickerAsistencia" class="col-md-5 margen-bottom fontSize2" data-url= "<?php echo site_url('profesor/getAsistenciaController/' . $listaAlumnos['numero']); ?>">
								        <div class="input-group date">
								            <input type="text" type="text" id="datepickerInput" placeholder="fecha de asistencia" readonly class="form-control input-lg">
								            <span class="input-group-btn">
								            	<button class="btn btn-default btn-lg" type="button" id="popoverDatapicker" data-container="body" data-toggle="popover" 
								            		data-placement="auto" data-trigger="hover" data-title="Tip" data-content="¡Selecciona la fecha de asistencia!.">
								            		<span class="fa fa-calendar fa-lg"></span>
								            	</button>
								            </span>
								        </div>
								     </div>
								 </div>

								 <div id="contenidoAsistencia"></div>
								<?php //$this->load->view('profesor/includes/asistencia'); ?>
							</div>
						</div>
						<div class="tab-pane active" id="listaEstudiantes">
							<div class="col-md-12" style="margin-top: 10px;">
								<?php $this->load->view('estudiante/listaEstudiantes'); ?>
							</div>
						</div>
					</div>

				</div>

				
			</div>

			<div class="tab-pane margen-top" id="trabajos">
				<div class="">
					<?php $this->load->view('estudiante/includes/trabajos'); ?>
				</div>
				
			</div>

			<div class="tab-pane" id="notas">
				<?php // Carga el bloque de las tablas para configurar y calificar
				$this->load->view('profesor/includes/notas') ?>
			</div>
		</div>
	</div>
</div>