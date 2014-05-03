<div class="tabbable">
	<ul class="nav nav-pills nav-justified" style="padding: 2%;">
		<li class="active"><a href="#agregar" data-toggle="pill">Agregar Evaluaciones</a></li>
		<li><a href="#configurar" data-toggle="pill">Configurar Evaluaciones</a></li>
	</ul>

	<div class="tab-content">

		<div class="tab-pane active" id="agregar" style="background-color: rgba(139, 213, 224, 0.10);">
			

				<ul class="nav nav-tabs">									
					<?php for ($i=0; $i < count($listaAlumnos['listaEstudiantes'][0]['notas']) ; $i++): ?>
						<li class="<?php if ($i == 0) {echo "active";} ?>"><a href="#<?php echo $i; ?>" data-toggle="tab">Evaluación <?php echo $i+1; ?></a></li>
					<?php endfor; ?>
				</ul>
				
				<div class="tab-content">
					<div class="col-md-12 col-sm-12 hidden-xs padding4" style=" background-color: #FFFFFF;margin-top: 20px;">
						<div class="col-md-4"><strong>Estudiantes</strong></div>
						<div class="col-md-4"><strong>Concepto</strong></div>
						<div class="col-md-4 text-center"><strong>Nota</strong></div>
					</div>

				<?php for ($key=0; $key < count($listaAlumnos['listaEstudiantes'][0]['notas']) ; $key++): ?>
					<div class="tab-pane <?php if ($key == 0) {echo "active";} ?>" id="<?php echo $key; ?>">

						<?php foreach ($listaAlumnos['listaEstudiantes'] as $keyEstudiantes => $value): ?>

							<?php $notas = $value['notas'][$key]; ?>
							<div class="col-md-12 well-white margen-top-bottom">
								<div class="col-md-4"><strong><?php echo $value['nombre'] .' '. $value['apellido']; ?></strong></div>

								<div class="col-md-4"><span class=" <?php  echo $key;?>"><?php echo $notas['concepto']; ?></span></div>
											
								<div class="col-md-4">
									<?php echo form_open('user/actualizarNota/' . $notas['Calificacion_id'] .'/'. $value['Estudiante_identificacion'] , array('class' => 'rangeAjax')); ?>
										<span class=" <?php  echo $key;?>">
											<input id="range<?php echo $rand = rand(); ?>" type="number" class="text-center form-control input-lg clear-input" name="nota" value="<?php echo $notas['nota']; ?>" min="0" max="5">
										</span>
									</form>
								</div>
							</div>

						<?php endforeach ?>
					</div>
				<?php endfor; ?>
					
				</div>
		</div>

		<div class="tab-pane" id="configurar" style="background-color: rgba(0, 170, 255, 0.1);">
			<div class="">
				<div class="">
					
					<div class="col-md-12 col-sm-12 hidden-xs padding4" style=" background-color: #FFFFFF;margin-bottom: 4px;">
				
						<div class="col-md-3 col-sm-3"><strong>Tipo de evaluación</strong></div>
						<div class="col-md-6 col-sm-6"><strong>Concepto</strong></div>
						<div class="col-md-2 col-sm-2"><strong>Peso (%)</strong></div>
			
					</div>
					<div id="logros" class="col-md-12 col-sm-12">
						<?php foreach ($listaCalificaciones as $key => $value): ?>
						<div style="" id="<?php echo $value['id'] ?>" class="col-md-12 col-sm-12 well-white margen-top-bottom">
														
							<div class="col-md-3 col-sm-3 col-md-clear">
								<strong class=""><?php echo $value['tipo_evaluacion']; ?></strong>
							</div>
							<div class="col-md-6 col-sm-6"><?php echo $value['concepto']; ?></div>
							
							<div class="col-md-2 col-sm-2 col-md-clear">
								<?php //echo form_open('user/actPonderacionNota/' . $value['id'], array('class' => 'rangeAjax')); ?>
								<form action="<?php echo site_url('user/actPonderacionNota/' . $value['id']); ?>"  class="rangeAjax">

									<div class="form-group">
										<input id="range<?php echo $rand = rand(); ?>" type="number" class="text-center form-control input-lg clear-input" name="ponderacion" min="1" max="100" step="1" 
										value="<?php echo $value['ponderacion']; ?>" style="padding: 6px 6px; *">
									</div>
								</form>

							</div>
							<div class="col-md-1 col-sm-1">
								<a class="btn btn-info ActualizarCalificacion btn-block tooltipInfo" href="<?php echo site_url('user/formLogroActualizar/' . $value['id']); ?>" 
									data-placement="top" title="Editar"
									type="button" data-toggle="modal" data-target="#myModalasd">
									<i class="fa fa-pencil-square-o fa-lg"></i> <span class="visible-xs">Editar</span></a>
							</div>
						</div>
						<?php endforeach; ?>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<a id="AgregarCalificacion" href="<?php echo site_url('user/formLogro/' . $listaAlumnos['numero'] .'/' . $listaAlumnos['Materia_id']); ?>" 
						class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#myModalasd">
						<i class="fa fa-plus-sign fa-lg"></i> Agregar calificación
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php //$this->load->view('profesor/includes/modalNotas'); ?>


<div class="modal modalNotas" id="myModalasd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
<!-- /.modal -->
