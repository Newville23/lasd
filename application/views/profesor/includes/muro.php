<div class="bloquePegadoUp row" style="margin-left: 0px;margin-right: 0px;">
	<div class="padding4">
		<span class="text-success"><i class="fa fa-puzzle-piece fa-lg"></i>
			<?php echo ' Nombre de Materia'//$ProfesorFromClase['nombre']; //nombre profesor ?></span>
	</div>
</div>

<div class="bloquePegadoDown row" style="margin-left: 0px;margin-right: 0px;">
	<div class="tabbable">

		<ul class="nav nav-tabs nav-justified" style="">
		 	<li class=""><a href="#contenido" data-toggle="tab"><i class="fa fa-list-alt fa-lg fa-fw"></i> Contenido</a></li>
		 	<li class=""><a href="#notas" data-toggle="tab"><i class="fa fa-flask fa-lg fa-fw"></i> Evaluaciones</a></li>
			<li class="active"><a href="#foro" data-toggle="tab"><i class="fa fa-comments-o fa-lg fa-fw"></i> Foro</a></li>
			<li class=""><a href="#estudiantes" data-toggle="tab"><i class="fa fa-users fa-lg fa-fw"></i> Estudiantes</a></li>
			<li class=""><a href="#trabajos" data-toggle="tab"><i class="fa fa-tasks fa-lg fa-fw"></i> Trabajos</a></li>
			
		</ul>

		<div class="tab-content">

			<div class="tab-pane" id="contenido">
				<?php $this->load->view('profesor/includes/contenido') ?>
			</div>

			<div class="tab-pane active" id="foro">
				<div class="margen-top">

					<?php echo form_open('', array('class' => 'well2')) ?>
								
						<div class="form-group">
							<p Class="text-muted"><i class="fa fa-pencil fa-2x"></i><span> Crea un nuevo foro de discución</span></p>				
							<textarea name="tituloforo" id="tituloforo" required class="form-control textprincipal text-primary fontSize3" cols="30" rows="2" placeholder="Escribe un titulo o idea principal..."></textarea>
						</div>

						<div class="form-group">
							<textarea name="cuerpoforo" id="cuerpoforo" class="form-control fontSize3" cols="30" rows="5" placeholder="Desarrolla la pregunta.."></textarea>	
						</div>

						<div class="btn-group btn-foro" id="">
							<button id="enviarforo" class="btn btn-primary btn-lg" type="submit"><i class="fa fa-ok icon-white"></i> Enviar</button>
							<button id="" class="btn btn-default btn-lg cancelarforo" type="reset"><i class="fa fa-times"></i></button>
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
								            <input type="text" type="text" id="datepickerInput" placeholder="fecha de asistencia" readonly class="form-control input-lg" style="cursor:pointer">
								            <span class="input-group-btn">
								            	<button class="btn btn-default btn-lg" style="border-radius: 0 4px 4px 0;" type="button" id="" data-container="body" data-toggle="popover" 
								            		data-placement="right"  data-title="¡Selecciona la fecha de asistencia!.">
								            		<span class="fa fa-calendar fa-lg"></span>
								            	</button>
								  
								            	<div id="popoverDatapicker" class="hidden-xs popover fade right in" style="top: -20px; left: 60px; display: block;">
													<div class="arrow"></div>
													<h3 class="popover-title">¡Selecciona la fecha de asistencia!.</h3>
												</div>
								            </span>
								        </div>
								     </div>
								 </div>

								 <div id="contenidoAsistencia"></div>
								
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

