<?php echo form_open('admin/clase', array('class' => 'form-horizontal formajax')) ?>
	<div class="row-fluid" id="clase">
		<div id="" class="Matbar margen1 span10 offset1" style="background-color: #DD236D;">
			
			<div class="alerta"></div>
			
			<div class="row-fluid">
				
				<div class="control-group">
					<select name="materia_identificacion" id="" class="input-block-level transformarEscala1 span9 fontSize2">
						<option class="muted" value="">Selecciona la materia de la clase:</option>
				        <option value="1">Matematicas</option>
				        <option value="2">Español</option>
				        <option value="3">Sociales</option>
				        <option value="4">Ingles</option>
					</select>
				</div>

				<div class="control-group">
					<select name="Curso_codigo" id="" class="input-block-level transformarEscala1 span9 fontSize2">
				        <option class="muted" value="">Selecciona el curso:</option>
				        <option value="1">Noveno (9º A)</option>
				        <option value="2">Noveno (9º B)</option>
					</select>
				</div>

				<div class="control-group">
					<select name="Profesor_identificacion" id="" class="input-block-level transformarEscala1 span9 fontSize2">
				        <option class="muted" value="">Selecciona el Docente que dictará la clase:</option>
				        <option value="10">Pedro José Torres</option>
				        <option value="11">Alba Bonet</option>
				        <option value="901206">Alfredo Lora</option>
					</select>
				</div>
			</div>

			<div class="btn-group" style="padding-top: 10%;">
				<button class="btn btn-large" type="submmit"><span class="muted">Guardar</span></button>
				<button class="btn btn-large" type="reset"><i class="icon-remove icon-large muted"></i></button>
			</div>
		</div>
	</div>
</form>