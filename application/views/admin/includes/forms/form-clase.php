<?php echo form_open('admin/clase', array('class' => 'form-horizontal formajax')) ?>
	<div class="row" id="clase">
		<div id="" class="Matbar margen1 col-md-10 col-md-offset-1" style="background-color: #DD236D;">
			
			<div class="alerta"></div>
				
				<div class="form-group">
					<select name="materia_identificacion" id="" class="form-control input-lg">
						<option class="text-muted" value="">Selecciona la materia de la clase:</option>
				        <option value="1">Matematicas</option>
				        <option value="2">Español</option>
				        <option value="3">Sociales</option>
				        <option value="4">Ingles</option>
					</select>
				</div>

				<div class="form-group">
					<select name="Curso_codigo" id="" class="form-control input-lg">
				        <option class="text-muted" value="">Selecciona el curso:</option>
				        <option value="1">Noveno (9º A)</option>
				        <option value="2">Noveno (9º B)</option>
					</select>
				</div>

				<div class="form-group">
					<select name="Profesor_identificacion" id="" class="form-control input-lg">
				        <option class="text-muted" value="">Selecciona el Docente que dictará la clase:</option>
				        <option value="10">Pedro José Torres</option>
				        <option value="11">Alba Bonet</option>
				        <option value="901206">Alfredo Lora</option>
					</select>
				</div>

			<div class="btn-group" style="padding-top: 10%;">
				<button class="btn btn-default btn-lg" type="submmit"><span class="text-muted">Guardar</span></button>
				<button class="btn btn-default btn-lg" type="reset"><i class="icon-remove icon-large text-muted"></i></button>
			</div>
		</div>
	</div>
</form>