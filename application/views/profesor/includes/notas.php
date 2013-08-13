<div class="tabbable">
	<ul class="nav nav-pills">
		<li class="active"><a href="#agregar" data-toggle="pill">Agregar Notas</a></li>
		<li><a href="#configurar" data-toggle="pill">Configurar Notas</a></li>
	</ul>

	<div class="tab-content">

		<div class="tab-pane active" id="agregar">
			<table class="table table-hover table-striped table-bordered tabla-notas fontSize2">
				
				<thead>
					<tr>
						<th></th>
						<th class="tabla-cabecera" id="1342" colspan="2">1</th>
						<th class="tabla-cabecera" id="1111" colspan="2">2</th>
						<th class="tabla-cabecera" id="3444" colspan="2">3</th>
						<th></th>
					</tr>
					<tr>
						<th>Nombre</th>
						<th><span class="desaparecer 1342">Concepto</span></th>
						<th></th>
						<th><span class="desaparecer 1111">Concepto</span></th>
						<th></th>
						<th><span class="desaparecer 3444">Concepto</span></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Juan Gonzales</td>
						<td><span class="desaparecer 1342">Lorem ipsum dolor sit.</span></td>
						<td>4,2</td>
						<td><span class="desaparecer 1111">Lorem ipsum dolor sit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, dignissimos animi commodi odit. Dignissimos, velit, fuga, tenetur, cum tempora temporibus dolores necessitatibus aliquam sapiente itaque eum eius eaque excepturi architecto?</span></td>
						<td>4,2</td>
						<td><span class="desaparecer 3444">Lorem ipsum dolor.</span></td>
						<td>4,2</td>
						<td><input type="range" class="rango" name="points" min="1" max="100"></td>
					</tr>
					<tr>
						<td>Pedro daniel dominguez</td>
						<td><span class="desaparecer 1342">Lorem ipsum dolor sit amet, consectetur.</span></td>
						<td>4,2</td>
						<td><span class="desaparecer 1111">Lorem ipsum dolor sit amet, consectetur.</span></td>
						<td>4,2</td>
						<td><span class="desaparecer 3444">Lorem ipsum dolor sit amet, consectetur.</span></td>
						<td>4,2</td>
						<td><input type="range" class="rango" name="points" min="1" max="100"></td>
					</tr>
					<tr>
						<td>Juan Gonzales</td>
						<td><span class="desaparecer 1342">Lorem ipsum dolor </span></td>
						<td>4,2</td>
						<td><span class="desaparecer 1111">Lorem ipsum dolor </span></td>
						<td>4,2</td>
						<td><span class="desaparecer 3444">Lorem ipsum dolor </span></td>
						<td>4,2</td>
						<td><input type="range" class="rango" name="points" min="1" max="100"></td>
					</tr>
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
						<th>Fecha</th>
						<th>Tipo de evaluación</th>
						<th>Detalle</th>
						<th colspan="2">Peso %</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td contenteditable="true">Lore veritatis.</td>
						<td contenteditable="true">cuerpo</td>
						<td contenteditable="true">Lorem ipsum dolor sit amet, conndi officiis cum ea velit veniam explicabo aut labore necessitatibus nam debitis laudantium!</td>
						<td>33</td>
						<td><input id="slider" type="range" class="rango" name="points" min="1" max="100"></td>
					</tr>
					<tr>
						<td contenteditable="true">cuerpo</td>
						<td contenteditable="true">cuerpo</td>
						<td contenteditable="true">cuerpo</td>
						<td contenteditable="true">33</td>
						<td><input type="range" class="rango" name="points" min="1" max="100"></td>
					</tr>
					<tr>
						<td contenteditable="true">lolo</td>
						<td contenteditable="true">Lorem ipsum enda? Cupiditate, earum?</td>
						<td contenteditable="true">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, dignissimos magni distinctio animi sit!</td>
						<td contenteditable="true">33</td>
						<td>
							<input type="range" class="rango" name="points" min="1" max="100">
							<div class="progress progress-info progress-striped">
							  <div class="bar" style="width: 20%"></div>
							</div>
						</td>
					</tr>
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