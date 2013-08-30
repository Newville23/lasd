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

							<th class="tabla-cabecera" id="<?php echo $i; ?>" colspan="2"><?php echo $i+1; ?></th>

						<?php endfor; ?>
						
						<th></th>
					</tr>
					<tr>
						<th>Nombre</th>

						<?php for ($i=0; $i < count($listaAlumnos['listaEstudiantes'][0]['notas']) ; $i++): ?>
							<th><span class="desaparecer <?php echo $i; ?>">Concepto</span></th>
							<th></th>
						<?php endfor; ?>
	
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listaAlumnos['listaEstudiantes'] as $key => $value): ?>
					<tr>
						<td><?php echo $value['nombre'] .' '. $value['apellido']; ?></td>

						<?php foreach ($value['notas'] as $key => $notas): ?>
							<td><span class="desaparecer <?php  echo $key;?>"><?php echo $notas['concepto']; ?></span></td>
							<td><?php echo $notas['nota']; ?></td>
						<?php endforeach; ?>
						
						<?php if (!empty($value['notas'])): ?>
							<td><input type="range" class="rango" name="points" min="1" max="100"></td>
						<?php endif ?>
						
					</tr>
					<?php endforeach ?>

				</tbody>
			</table>
			<div class="row-fluid">
				<div class="btn-group span12">
					<!-- <button class="btn btn-large span6" type="button"><i class="icon-plus-sign icon-large"></i> Agregar calificación</button> -->
					<button class="btn btn-large span12" type="button"><i class="icon-ok icon-large"></i> ¡Listo!</button>
				</div>
			</div>
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
				<tbody>
					<?php foreach ($listaCalificaciones as $key => $value): ?>
						<?php echo form_open(''); ?>
							<tr>
								<td><button class="btn btn-primary" type="submmit">Save</button></td>
								<td contenteditable="true"><?php echo $value['tipo_evaluacion']; ?></td>
								<td contenteditable="true"><?php echo $value['concepto']; ?></td>
								<td contenteditable="true"><?php echo $value['ponderacion']; ?></td>
								<td><input id="slider" type="range" class="rango" name="points" min="1" max="100"></td>
							</tr>
						</form>
					<?php endforeach; ?>
					
				</tbody>
			</table>
			<div class="row-fluid">
				<div class="btn-group span12">
					<button class="btn btn-large span6" type="button"><i class="icon-plus-sign icon-large"></i> Agregar calificación</button>
					<button class="btn btn-large span6" type="button"><i class="icon-ok icon-large"></i> ¡Listo!</button>
				</div>
			</div>
		</div>
	</div>
</div>