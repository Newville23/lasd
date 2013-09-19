<div class="tabbable">
	<ul class="nav nav-pills">
		<li class="active"><a href="#agregar" data-toggle="pill">Agregar Notas</a></li>
		<li><a href="#configurar" data-toggle="pill">Configurar Notas</a></li>
	</ul>

	<div class="tab-content">

		<div class="tab-pane active" id="agregar">
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
										<input id="range<?php echo $rand; ?>" type="range" class="range" name="nota" value="<?php echo $notas['nota']; ?>" step="0.1" min="0" max="5">
									</span>
								</form>
							</td>
						<?php endforeach; ?>
					
					</tr>
					<?php endforeach ?>

				</tbody>

			</table>
		</div>

		<div class="tab-pane" id="configurar">

			<table class="table table-hover table-striped table-bordered">
				
				<thead>
					<tr>
						<th></th>
						<th>Tipo de evaluación</th>
						<th>Detalle</th>
						<th colspan="2">Peso %</th>
					</tr>
				</thead>
				<tbody id="logros">
					<?php foreach ($listaCalificaciones as $key => $value): ?>
					<tr id="<?php echo $value['id'] ?>">
						<td><a href="<?php echo site_url('user/formLogroActualizar/' . $value['id']); ?>" class="btn btn-info ActualizarCalificacion" type="button" data-toggle="modal" data-target="#myModalasd">Editar</a></td>
						
						<td><?php echo $value['tipo_evaluacion']; ?></td>
						<td><?php echo $value['concepto']; ?></td>
						<td class="negrita" id="textNoForm<?php echo $rand = rand(); ?>"><?php echo $value['ponderacion']; ?></td>
						<td>
							<?php echo form_open('user/actPonderacionNota/' . $value['id'], array('class' => 'rangeAjax')); ?>
								<input id="range<?php echo $rand; ?>" type="range" class="range" name="ponderacion" min="1" max="100" step="1" value="<?php echo $value['ponderacion']; ?>">
							</form>
						</td>
					</tr>
					<?php endforeach; ?>

				</tbody>
			</table>
			<div class="row">
				<div class="btn-group col-md-12">
					<a id="AgregarCalificacion" href="<?php echo site_url('user/formLogro/' . $listaAlumnos['numero'] .'/' . $listaAlumnos['Materia_id']); ?>" 
						class="btn btn-lg col-md-6" data-toggle="modal" data-target="#myModalasd">
						<i class="icon-plus-sign icon-large"></i> Agregar calificación
					</a>
					<button class="btn btn-lg col-md-6" type="button"><i class="icon-ok icon-large"></i> ¡Listo!</button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php //$this->load->view('profesor/includes/modalNotas'); ?>
<div id="myModalasd" class="modal hide modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i></button>
        <h4 class="text-muted" id="myModalLabel">Notas</h4>
    </div>

    <div class="modal-body" id="modalNotas">
    </div>
    <div class="modal-footer">  
    </div>

</div>