<form action="#" method="POST" class="form-horizontal">
	<div id="profesor" class="row-fluid">
		<div class="Matbar margen1 span6 offset1" style="background-color: #52b9e9;">
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

		<div class="margen1 span5 bloquePegadoRight">

			<h4 class="padding3">Datos del Docente</h4>
			<div class="control-group">
				<label for="" style="color: #666;">Tipo de identificación:</label>
				<select name="" id="" class="input-block-level" required>
			        <option value="">Seleccione:</option>
			        <option value="Registro civil">Registro civil</option>
			        <option value="Tarjeta de identidad">Tarjeta de identidad</option>
			        <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
				</select>

				<input type="number" placeholder="Número de identificación" required class="input-block-level">
			</div>

			<div class="control-group">
				<input type="text" placeholder="Profesión" class="input-block-level">
			</div>

			<div class="control-group">
				<label for="fecha_de_nacimiento" style="color: #666;">Fecha de nacimiento:</label>
				<input id="fecha_de_nacimiento" type="date" class="input-block-level">
			</div>

		</div>
	</div>
</form>