<div class="modal-dialog">
    <div class="modal-content">

	    <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times fa-lg text-error"></i></button>
	        <h4 class="modal-title text-muted">Notas</h4>
	    </div>

	    <div class="modal-body" id="">

			 <?php echo form_open('user/' . $controller, array('class' => '  formajax')); ?>
			 <?php //usleep(4500000); ?>
			 	<div class="alerta"></div>

				 <div class="row">         
				    <input class="form-control margen-top-bottom2 input-lg" name="tipoeval" placeholder="Tipo de evaluación" type="text" value="<?php if (isset($logro)) { echo $logro['tipo_evaluacion'];} ?>">

				    <textarea class="form-control margen-top-bottom2 input-lg" placeholder="Detalle" name="detalleNota" id="" rows="4"><?php if (isset($logro)) { echo $logro['concepto'];} ?></textarea>

				    <input class="form-control rangeText margen-top-bottom2 input-lg clear-input" min="1" max="100" name="peso" placeholder="Peso %" value="<?php if (isset($logro)) { echo $logro['ponderacion'];} ?>"
				    	type="number" id="text<?php echo $rand = rand(); ?>">
<!-- 
				    <div class="col-md-11">
				    	<input class="range" style="width: 100%;" name="" min="1" value="<?php if (isset($logro)) { echo $logro['ponderacion'];} ?>"
				    		step="1" max="100" type="range" id="range<?php echo $rand; ?>">  
				    </div> -->
				 </div>
				
				<div class="btn-group margen-top-bottom2 btn-group-justified">
					<div class="btn-group">
						<button class="btn btn-default btn-lg" type="reset">Limpiar</button>
					</div>
			     	<div class="btn-group">
			     		<button class="btn btn-primary btn-lg" type="submit">Guardar</button>
			     	</div>
			 	</div>
			 </form> 


			<script src="<?php echo base_url("bootstrap/js/bibliotecas/form-ajax.js"); ?>"></script>

		</div><!-- /.modal-body -->
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
