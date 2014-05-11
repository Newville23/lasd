<div class="col-md-12 alert alert-info" style="margin-top: 20px;">
	Selecciona el periodo a evaluar.
	<div class="btn-group" data-toggle="buttons">
		<label class="btn btn-default btn-lg">
			<input class="checkbox-filtro" id="periodo1" value="1" type="radio" name="options">Periodo 1
		</label>
		<label class="btn btn-default btn-lg">
			<input class="checkbox-filtro" id="periodo2" value="2" type="radio" name="options">Periodo 2
		</label>
		<label class="btn btn-default btn-lg">
			<input class="checkbox-filtro" id="periodo3" value="3" type="radio" name="options">Periodo 3
		</label>
		<label class="btn btn-default btn-lg">
			<input class="checkbox-filtro" id="periodo4" value="4" type="radio" name="options">Periodo 4
		</label>
	</div>
</div>

<!-- 	<div class="hoho1 container-filt">1</div>
	<div class="hoho2 container-filt">2</div>
	<div class="hoho3 container-filt">3</div>
	<div class="hoho4 container-filt">4</div>

	<div class="hoho1 container-filt">5</div>
	<div class="hoho2 container-filt">6</div>
	<div class="hoho3 container-filt">7</div>
	<div class="hoho4 container-filt">8</div> -->



<div class="tabbable col-md-12 col-sm-12 cont-aparecer hidden">
	<ul class="nav nav-pills nav-justified" style="padding: 2%;">
		<li class="active"><a href="#agregar" data-toggle="pill">Asignar Notas</a></li>
		<li><a href="#configurar" data-toggle="pill">Configurar Evaluaciones</a></li>
	</ul>

	<div class="tab-content">

		<div class="tab-pane active" id="agregar" style="background-color: rgba(139, 213, 224, 0.10);">
			

				<ul class="nav nav-tabs">									
					<?php for ($i=0; $i < count($listaAlumnos['listaEstudiantes'][0]['notas']) ; $i++): ?>
						<li class="container-filt <?php if ($i == 0) {echo "active";} echo " hoho" . $listaAlumnos['listaEstudiantes'][0]['notas'][$i]['periodo'];?>">
							<a href="#<?php echo $i; ?>" data-toggle="tab"><?php echo 'Evaluación ' . ($i + 1) .': '. $listaAlumnos['listaEstudiantes'][0]['notas'][$i]['tipo_evaluacion']; ?></a></li>
					<?php endfor; ?>
				</ul>
				
				<div class="tab-content">
					<div class="col-md-12 col-sm-12 hidden-xs padding4" style=" background-color: #FFFFFF;margin-top: 20px;">
						<div class="col-md-4 col-sm-4"><strong>Estudiantes</strong></div>
						<div class="col-md-6 col-sm-6"><strong>Concepto</strong></div>
						<div class="col-md-2 col-sm-2 text-center"><strong>Nota</strong></div>
					</div>

					<?php for ($key=0; $key < count($listaAlumnos['listaEstudiantes'][0]['notas']) ; $key++): ?>
						<div class="tab-pane container-filt <?php if ($key == 0) {echo "active";} echo " hoho" . $listaAlumnos['listaEstudiantes'][0]['notas'][$key]['periodo']; ?>" id="<?php echo $key; ?>">

							<?php foreach ($listaAlumnos['listaEstudiantes'] as $keyEstudiantes => $value): ?>

								<?php $notas = $value['notas'][$key]; ?>
								<div class="col-md-12 col-sm-12 well-white margen-top-bottom">
									<div class="col-md-4 col-sm-4"><strong><?php echo $value['nombre'] .' '. $value['apellido']; ?></strong></div>

									<div class="col-md-6 col-sm-6"><span class=" <?php  echo $key;?>"><?php echo $notas['concepto']; ?></span></div>
												
									<div class="col-md-2 col-sm-2">
										<?php echo form_open('user/actualizarNota/' . $notas['Calificacion_id'] .'/'. $value['Estudiante_identificacion'] , array('class' => 'rangeAjax')); ?>
											<span class=" <?php  echo $key;?>">
												<input id="range<?php echo $rand = rand(); ?>" type="number" placeholder="" class="text-center form-control input-lg clear-input" 
												name="nota" value="<?php echo $notas['nota']; ?>" min="0" max="5" step="0.1">
											</span>
										</form>
									</div>
								</div>

							<?php endforeach ?>
						</div>
					<?php endfor; ?>
					
				</div>
		</div>

		<div class="tab-pane" id="configurar">

				<?php $periodoTempo = 0; ?>
				<div id="logros" class="col-md-12 col-sm-12">
						<?php  //echo "<pre>"; print_r($listaCalificaciones); echo "</pre>";?>
						<?php foreach ($listaCalificaciones as $key => $value): ?>
						<?php //echo $periodoTempo; ?>
						<?php if ($periodoTempo != $value['id_indicador']): ?>
							<?php $periodoTempo = $value['id_indicador']; ?>

						<div id="" style="margin-top: 20px;" class="well-info row container-filt hoho<?php echo $value['periodo']; ?>">
				            
				            <div class="col-md-12 col-sm-12 well-lista margen-top-bottom">
				               	<div style="padding: 8px 5px;font-size: 13px;"><strong>Indicador: </strong><?php echo $value['contenido']; ?></div>
				            </div>

					        <div class="col-md-12 col-sm-12 hidden-xs padding5" style="">
								<div class="col-md-3 col-sm-3"><strong>Tipo de evaluación</strong></div>
								<div class="col-md-6 col-sm-6"><strong>Concepto</strong></div>
								<div class="col-md-2 col-sm-2"><strong>Peso (%)</strong></div>
							</div>
				        
				        <?php else: ?> 
				        <div id="" class="well-info row container-filt hoho<?php echo $value['periodo']; ?>">
				        <?php endif ?>

							<div style="" id="<?php echo $value['id'] ?>" class="col-md-12 col-sm-12 well-white margen-top-bottom">
															
								<div class="col-md-3 col-sm-3 col-md-clear">
									<strong class=""><?php echo $value['tipo_evaluacion']; ?></strong>
								</div>
								<div class="col-md-6 col-sm-6"><?php echo $value['concepto']; ?></div>
								
								<div class="col-md-2 col-sm-2 col-md-clear">
									<?php //echo form_open('user/actPonderacionNota/' . $value['id'], array('class' => 'rangeAjax')); ?>
									<form action="<?php echo site_url('user/actPonderacionNota/' . $value['id']); ?>"  class="rangeAjax">

										<div class="form-group">
											<input id="range<?php echo $rand = rand(); ?>" type="number" placeholder="%" class="text-center form-control input-lg clear-input" name="ponderacion" min="1" max="100" step="1" 
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
						</div>
						<?php endforeach; ?>

				</div>


			<div class="row">
				<div class="col-md-12 col-sm-12">
					<a id="AgregarCalificacion" href="<?php echo site_url('user/formLogro/' . $listaAlumnos['numero'] .'/' . $listaAlumnos['Materia_id']); ?>" 
						class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#myModalasd">
						<i class="fa fa-plus-sign fa-lg"></i> Agregar evaluacíon
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
