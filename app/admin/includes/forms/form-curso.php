<?php echo form_open('admin/curso', array('class' => '  formajax')) ?>
	<div class="row" id="curso">
		<div id="" class="Matbar margen1 col-md-10 col-md-offset-1" style="background-color: #f88529;">
			
			<div class="alerta"></div>
			
			<div class="row">
				
				<div class="col-lg-6">
					<select name="nombre_curso" id="" class="form-control input-lg">
						<option class="text-muted" value="">Grado del curso:</option>
				        <option value="11">Undécimo (11º)</option>
				        <option value="10">Décimo (10º)</option>
				        <option value="9">Noveno (9º)</option>
				        <option value="8">Octavo (8º)</option>
				        <option value="7">Septimo (7º)</option>
				        <option value="6">Sexto (6º)</option>
				        <option value="5">Quinto (5º)</option>
				        <option value="4">Cuarto (4º)</option>
				        <option value="3">Tercero (3º)</option>
				        <option value="2">Segundo (2º)</option>
				        <option value="1">Primero (1º)</option>
					</select>
				</div>

				<div class="col-lg-6">
					<input type="text" name="nombre_indice" placeholder="Indice ej: A, B, C..." class="form-control input-lg" style="text-transform: uppercase;">
				</div>

			</div>

				<div class="">
					<select name="director_grupo" id="" class="form-control input-lg">
				        <option class="text-muted" value="">Docente director de grupo:</option>
				        <option value="10">Pedro José Torres</option>
				        <option value="11">Alba Bonet</option>
				        <option value="901206">Alfredo Lora</option>
					</select>
				</div>

			<div class="btn-group" style="padding-top: 10%;">
				<button class="btn btn-default btn-lg" type="submmit"><span class="text-muted">Guardar</span></button>
				<button class="btn btn-default btn-lg" type="reset"><i class="fa fa-times fa-lg text-muted"></i></button>
			</div>

		</div>
	</div>
</form>