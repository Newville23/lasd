<?php echo form_open('admin/materia', array('class' => 'form-horizontal formajax')) ?>
	<div class="row" id="materia">

		<div id="" class="Matbar col-md-10 col-md-offset-1 margen1" style="background-color: #932ab6; min-height: 400px;">
			
		
			<div class="control-group fontSize3" style="padding-top: 10%;">
				<input type="text" name="nombre_materia" placeholder="Nombre de la nueva materia..." class="  " >
			</div>

			<div class="alerta"></div>

			<div class="btn-group" style="padding-top: 10%;">
				<button class="btn btn-lg" type="submmit"><span class="muted">Guardar</span></button>
				<button class="btn btn-lg" type="reset"><i class="icon-remove icon-large muted"></i></button>
			</div>
		</div>

	</div>
</form>