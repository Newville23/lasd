<form action="#" method="POST" class="form-horizontal">
	<div class="row-fluid" id="estudiante">
		<div class="Matbar span6 offset1 margen1" style="background-color: ForestGreen;">
			<h4 class="padding3">Datos de Usuario</h4>

				<div class="control-group">
					<input type="text" placeholder="Nombre de Usuario*" required class="input-block-level tipoTexto">

					<input type="password" placeholder="Contraseña*" required class="input-block-level tipoTexto">
				</div>

				<div class="control-group">
					<input type="text" placeholder="Nombres*" required class="input-block-level tipoTexto">

					<input type="text" placeholder="Apellidos*" required class="input-block-level tipoTexto">
				</div>

				<div class="control-group">
					<input type="text" placeholder="Email*" required class="input-block-level tipoTexto">

					<input type="text" placeholder="Usuario Facebook" class="input-block-level tipoTexto">
				
					<input type="text" placeholder="Twiter" class="input-block-level tipoTexto">
		
				</div>

				<div class="btn-group">
					<button class="btn btn-large" type="submmit"><span class="muted">Guardar</span></button>
					<button class="btn btn-large" type="reset"><i class="icon-remove icon-large muted"></i></button>
				</div>
		</div>
		<div class="bloquePegadoRight span5 margen1">
								
			<h4 class="padding3">Datos del Estudiante</h4>
			<div class="control-group">
				<label for="" style="color: #666;">Tipo de identificación:</label>
				<select name="" id="" class="input-block-level">
			        <option value="">Seleccione:</option>
			        <option value="Registro civil">Registro civil</option>
			        <option value="Tarjeta de identidad">Tarjeta de identidad</option>
			        <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
				</select>

				<input type="number" placeholder="Número de identificación" class="input-block-level">
			</div>

			<div class="control-group">
				<label for="fecha_de_nacimiento" style="color: #666;">Fecha de nacimiento:</label>
				<input id="fecha_de_nacimiento" type="date" class="input-block-level">
			</div>

			<div class="control-group">
				<label for="" style="color: #666;">Tipo de sangre:</label>
				<select name="" id="" class="span6">
					<option value="">Seleccione:</option>
		        	<option value="O">O</option>
		        	<option value="A">A</option>
		        	<option value="B">B</option>
		        	<option value="AB">AB</option>
				</select>

				<select name="" id="" class="span6">
		        	<option value="">Factor RH:</option>
		        	<option>Positivo</option>
		        	<option>Negativo</option>
				</select>
			</div>

			<div class="control-group">
				<label for="" style="color: #666;">Institución en la que estudia:</label>
				<select name="" id="" class="input-block-level">
					<option value="10">Seleccione:</option>
		        	<option value="11">Colegio 1</option>
		        	<option value="12">Colegio 2</option>
		        	<option value="13">Colegio 3</option>
		        	<option value="14">Colegio 4</option>
				</select>
			</div>
		</div>
	</div>
</form>