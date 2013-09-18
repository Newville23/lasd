<?php echo form_open('admin/selectinstitucion', array('class' => 'form-horizontal', 'id' => 'selector-colegio')) ?>
	<div class="row" id="institucion">

		<div id="" class="Matbar col-md-10 col-md-offset-1 margen1" style="min-height: 300px;">
				
			<div class="alerta" style="position: relative; top: 30px;"></div>
			
			<input type="hidden" id="uriOculta" name="" value="<?php echo site_url('admin/verificarinstitucion'); ?>">

			<div class="form-group" style="padding-top: 6%;">
				<label for="" style="color: #ddd;"><strong>Seleccionar Institución:</strong></label>
				<select name="Institucion_rut" id="" class="form-control input-lg">
					<option value="">Seleccione:</option>
	       			<option value="10">Colegio 1</option>
	       			<option value="11">Colegio 2</option>
	       			<option value="12">Colegio 3</option>
	       			<option value="13">Colegio 4</option>
				</select>
			</div>
						
		</div>
	</div>
</form>