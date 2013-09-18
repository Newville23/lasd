			<?php echo form_open('admin/institucion', array('class' => 'form-horizontal formajax', 'id' => '')) ?>
			
				<div id="institucion" class="row">
					<div class="Matbar margen1 col-md-10 col-md-offset-1" style="">

						<div class="alerta"></div>

						<div class="form-group">
							<input type="text" name="rut_institucion" autocomplete="off" required placeholder="RUT de la Intitución" class="fontSize4 form-control input-lg">
						</div>
						<div class="form-group">
							<input type="text" name="nombre_institucion" autocomplete="off" required placeholder="Escriba el nombre de la Institución" class="fontSize4 form-control input-lg">
						</div>
						<div class="form-group">
							<input type="text" name="rector_institucion" autocomplete="off" required placeholder="Nombre del Rector" class="fontSize4 form-control input-lg">
						</div>
						
						<div class="btn-group">
							<button class="btn btn-default btn-lg" type="submmit"><span class="muted">Guardar</span></button>
							<button class="btn btn-default btn-lg" type="reset"><i class="icon-remove icon-large muted"></i><span class="muted"> Limpiar</span></button>
						</div>
					</div>
				</div>
			</form>
			