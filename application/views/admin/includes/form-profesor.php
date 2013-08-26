<?php echo form_open('admin/profesor', array('class' => 'form-horizontal formajax', 'id' => '')) ?>
	
	<div id="profesor" class="row-fluid">

		<div class="Matbar margen1 span6 offset1" style="background-color: #52b9e9;">
			<div class="alerta"></div>

			<h4 class="padding3">Datos de Usuario</h4>

				<div class="control-group">
					<input type="text" name="usuario" placeholder="Nombre de Usuario*" required class="input-block-level tipoTexto">

					<input type="password" name="pass" placeholder="Contraseña*" required class="input-block-level tipoTexto">
				</div>

				<div class="control-group">
					<input type="text" name="nombre" placeholder="Nombres*" required class="input-block-level tipoTexto">

					<input type="text" name="apellido" placeholder="Apellidos*" required class="input-block-level tipoTexto">
				</div>

				<div class="control-group">
					<input type="text" name="email" placeholder="Email*" required class="input-block-level tipoTexto">

					<input type="text" name="facebook" placeholder="Usuario Facebook" class="input-block-level tipoTexto">
				
					<input type="text" name="twiter" placeholder="Twiter" class="input-block-level tipoTexto">
		
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
				<select name="tipo_identificacion" required id="" class="input-block-level" >
			        <option value="">Seleccione:</option>
			        <option value="Registro civil">Registro civil</option>
			        <option value="Tarjeta de identidad">Tarjeta de identidad</option>
			        <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
				</select>

				<input type="number" name="identificacion" required placeholder="Número de identificación"  class="input-block-level">
			</div>

			<div class="control-group">
				<input type="text" name="profesion" placeholder="Profesión" class="input-block-level">
			</div>

			<div class="control-group">
				<label for="fecha_nacimiento" style="color: #666;">Fecha de nacimiento:</label>
				<input id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="input-block-level">
			</div>

		</div>
	</div>
</form>