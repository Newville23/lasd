<div class="tabbable">
	<ul class="nav nav-pills nav-justified" style="padding: 2%;">
		<li class="active"><a href="#agregar" data-toggle="pill">Agregar Notas</a></li>
		<li><a href="#configurar" data-toggle="pill">Configurar Notas</a></li>
	</ul>

	<div class="tab-content">

		<div class="tab-pane active" id="agregar">
			<div class="table-responsive">
				<table class="table table-hover table-striped table-bordered tabla-notas">
					
					<thead>
						<tr>
							<th></th>
							<?php for ($i=0; $i < count($listaAlumnos['listaEstudiantes'][0]['notas']) ; $i++): ?>

								<th class="tabla-cabecera" id="<?php echo $i; ?>" colspan="3"><?php echo $i+1; ?></th>

							<?php endfor; ?>
							
							
						</tr>
						<tr>
							<th>Nombre</th>

							<?php for ($i=0; $i < count($listaAlumnos['listaEstudiantes'][0]['notas']) ; $i++): ?>
								<th><span class="desaparecer <?php echo $i; ?>">Concepto</span></th>
								<th></th>
								<th></th>
							<?php endfor; ?>
						</tr>
					</thead>

					<tbody>

						<?php foreach ($listaAlumnos['listaEstudiantes'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['nombre'] .' '. $value['apellido']; ?></td>

							<?php foreach ($value['notas'] as $key => $notas): ?>
								
								<td><span class="desaparecer <?php  echo $key;?>"><?php echo $notas['concepto']; ?></span></td>
								
								<td id="textNoForm<?php echo $rand = rand(); ?>" class="<?php  echo $key;?>"><?php echo $notas['nota']; ?></td>
								
								<td>
									<?php echo form_open('user/actualizarNota/' . $notas['Calificacion_id'] .'/'. $value['Estudiante_identificacion'] , array('class' => 'rangeAjax')); ?>
										<span class="desaparecer <?php  echo $key;?>">
											<input id="range<?php echo $rand; ?>" type="text" class="range" name="nota" value="<?php echo $notas['nota']; ?>" step="0.1" min="0" max="5">
										</span>
									</form>
								</td>
							<?php endforeach; ?>
						
						</tr>
						<?php endforeach ?>

					</tbody>

				</table>
			</div>
		</div>

		<div class="tab-pane" id="configurar" style="background-color: rgba(0, 170, 255, 0.1);">
			<div class="">
				<div class="">
					
					<div class="col-md-12 col-sm-12 hidden-xs padding4" style=" background-color: #FFFFFF;margin-bottom: 4px;">
				
						<div class="col-md-3 col-sm-3"><strong>Tipo de evaluación</strong></div>
						<div class="col-md-6 col-sm-6"><strong>Detalle</strong></div>
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