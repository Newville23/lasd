<div class="tabbable">
	<ul class="nav nav-pills">
		<li class="active"><a href="#agregar" data-toggle="pill">Agregar Notas</a></li>
		<li><a href="#configurar" data-toggle="pill">Configurar Notas</a></li>
	</ul>

	<div class="tab-content">

		<div class="tab-pane active" id="agregar">
			<table class="table table-hover table-striped table-bordered">
				
				<thead>
					<tr>
						<th></th>
						<th colspan="2">1</th>
						<th colspan="2">2</th>
						<th colspan="2">3</th>
						<th></th>
					</tr>
					<tr>
						<th>Nombre</th>
						<th>Concepto</th>
						<th></th>
						<th>Concepto</th>
						<th></th>
						<th>Concepto</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Juan Gonzales</td>
						<td>Lorem ipsum dolor sit.</td>
						<td>4,2</td>
						<td>Lorem ipsum dolor sit.</td>
						<td>4,2</td>
						<td>Lorem ipsum dolor.</td>
						<td>4,2</td>
						<td><input type="range" name="points" min="1" max="100"></td>
					</tr>
					<tr>
						<td>Pedro daniel dominguez</td>
						<td>Lorem ipsum dolor sit amet, consectetur.</td>
						<td>4,2</td>
						<td>Lorem ipsum dolor sit amet, consectetur.</td>
						<td>4,2</td>
						<td>Lorem ipsum dolor sit amet, consectetur.</td>
						<td>4,2</td>
						<td><input type="range" name="points" min="1" max="100"></td>
					</tr>
					<tr>
						<td>Juan Gonzales</td>
						<td>Lorem ipsum dolor sit amet, consectetur.</td>
						<td>4,2</td>
						<td>Lorem ipsum dolor sit amet, consectetur.</td>
						<td>4,2</td>
						<td>Lorem ipsum dolor sit amet, consectetur.</td>
						<td>4,2</td>
						<td><input type="range" name="points" min="1" max="100"></td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="tab-pane" id="configurar">

			<table class="table table-hover table-striped table-bordered">
				
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Tipo de evaluación</th>
						<th>Detalle</th>
						<th>Peso</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Lore veritatis.</td>
						<td>cuerpo</td>
						<td>Lorem ipsum dolor sit amet, conndi officiis cum ea velit veniam explicabo aut labore necessitatibus nam debitis laudantium!</td>
						<td>33%</td>
						<td><input type="range" name="points" min="1" max="100"></td>
					</tr>
					<tr>
						<td>cuerpo</td>
						<td>cuerpo</td>
						<td>cuerpo</td>
						<td>33%</td>
						<td><input type="range" name="points" min="1" max="100"></td>
					</tr>
					<tr>
						<td>lolo</td>
						<td>Lorem ipsum enda? Cupiditate, earum?</td>
						<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, dignissimos magni distinctio animi sit!</td>
						<td>33%</td>
						<td>
							<input type="range" name="points" min="1" max="100">
							<div class="progress progress-info progress-striped">
							  <div class="bar" style="width: 20%"></div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>

			<button class="btn btn-large btn-block" type="button"><i class="icon-plus-sign icon-large"></i> Agregar calificación</button>

		</div>
	</div>
</div>