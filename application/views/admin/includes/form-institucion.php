			<?php echo validation_errors(); ?>

			<?php echo form_open('admin/institucion', array('class' => 'form-horizontal formajax', 'id' => '')) ?>
			
				<div id="institucion" class="row-fluid">
					<div class="Matbar margen1 span10 offset1" style="">

						<div class="alerta"></div>

						<div class="control-group">
							<input type="text" name="rut_institucion" autocomplete="off" required placeholder="RUT de la Intitución" class="input-block-level tipoTexto">
						</div>
						<div class="control-group">
							<input type="text" name="nombre_institucion" autocomplete="off" required placeholder="Escriba el nombre de la Institución" class="input-block-level tipoTexto">
						</div>
						<div class="control-group">
							<input type="text" name="rector_institucion" autocomplete="off" required placeholder="Nombre del Rector" class="input-block-level tipoTexto">
						</div>
						
						<div class="btn-group">
							<button class="btn btn-large" type="submmit"><span class="muted">Guardar</span></button>
							<button class="btn btn-large" type="reset"><i class="icon-remove icon-large muted"></i></button>
						</div>
					</div>
				</div>
			</form>
			