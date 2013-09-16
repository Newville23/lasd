	<?php echo form_open('admin/estudiante', array('class' => 'form-horizontal formajax')) ?>

		<div class="Matbar span6" style="background-color: ForestGreen;">

			<div class="alerta"></div>

			<h4 class="padding3">Datos de Usuario</h4>

				<div class="control-group">
					<input type="text" name="usuario" placeholder="Nombre de Usuario*" required class="input-block-level">

					<input type="password" name="pass" placeholder="Contraseña*" required class="input-block-level">
				</div>

				<div class="control-group">
					<input type="text" name="nombre" placeholder="Nombres*" required class="input-block-level">

					<input type="text" name="apellido" placeholder="Apellidos*" required class="input-block-level">
				</div>

				<div class="control-group">
					<input type="text" name="email" placeholder="Email*" required class="input-block-level">

					<input type="text" name="facebook" placeholder="Usuario Facebook" class="input-block-level">
				
					<input type="text" name="twiter" placeholder="Twiter" class="input-block-level">
		
				</div>

				<div class="btn-group">
					<button class="btn btn-large" type="submmit"><span class="muted">Guardar</span></button>
					<button class="btn btn-large" type="reset"><i class="icon-remove icon-large muted"></i></button>
				</div>
		</div>
		<div class="span6 Matbar" style="background-color: rgba(180, 180, 180, 0.7);">
								
			<h4 class="padding3">Datos del Estudiante</h4>
			<div class="control-group">
				<label for="" style="color: #666;">Tipo de identificación:</label>
				<select name="tipo_identificacion" id="" class="input-block-level">
			        <option value="">Seleccione:</option>
			        <option value="Registro civil">Registro civil</option>
			        <option value="Tarjeta de identidad">Tarjeta de identidad</option>
			        <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
				</select>

				<input type="number" name="identificacion" placeholder="Número de identificación" class="input-block-level">
			</div>

			<div class="control-group">
				<label for="fecha_de_nacimiento" style="color: #666;">Fecha de nacimiento:</label>
				<input id="fecha_de_nacimiento" name="fecha_nacimiento" type="date" class="input-block-level">
			</div>

			<div class="control-group">
				<label for="" style="color: #666;">Tipo de sangre:</label>
				<select name="tipo_sangre" id="" class="span6">
					<option value="">Seleccione:</option>
		        	<option value="O">O</option>
		        	<option value="A">A</option>
		        	<option value="B">B</option>
		        	<option value="AB">AB</option>
				</select>

				<select name="rh" id="" class="span6">
		        	<option value="">Factor RH:</option>
		        	<option>Positivo</option>
		        	<option>Negativo</option>
				</select>
			</div>
		</div>
	</form>