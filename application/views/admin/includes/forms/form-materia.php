<?php echo form_open('admin/materia', array('class' => 'form-horizontal formajax')) ?>
	<div class="row-fluid" id="materia">

		<div id="" class="Matbar span10 offset1 margen1" style="background-color: #932ab6; min-height: 400px;">
			
		
			<div class="control-group fontSize3" style="padding-top: 10%;">
				<input type="text" name="nombre_materia" placeholder="Nombre de la nueva materia..." class="input-block-level tipoTexto" >
			</div>

			<div class="alerta"></div>

			<div class="btn-group" style="padding-top: 10%;">
				<button class="btn btn-large" type="submmit"><span class="muted">Guardar</span></button>
				<button class="btn btn-large" type="reset"><i class="icon-remove icon-large muted"></i></button>
			</div>
		</div>

	</div>
</form>