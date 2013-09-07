 <?php echo form_open('user/' . $controller, array('class' => 'form-horizontal formajax')); ?>
 <?php usleep(500000); ?>
 	<div class="alerta"></div>
	 <div class="row-fluid">         
	    <input class="span12" name="tipoeval" placeholder="Tipo de evaluación" type="text" value="<?php if (isset($logro)) { echo $logro['tipo_evaluacion'];} ?>">

	    <textarea class="span12" placeholder="Detalle" name="detalleNota" id="" rows="4"><?php if (isset($logro)) { echo $logro['concepto'];} ?></textarea>

	    <input class="span12 rangeText" min="1" max="100" name="peso" placeholder="Peso %" value="<?php if (isset($logro)) { echo $logro['ponderacion'];} ?>"
	    	type="number" id="text<?php echo $rand = rand(); ?>">

	    <div class="span11">
	    	<input class="range" style="width: 100%;" name="" min="1" value="<?php if (isset($logro)) { echo $logro['ponderacion'];} ?>"
	    		step="1" max="100" type="range" id="range<?php echo $rand; ?>">  
	    </div>
	 </div>

	<div class="btn-group pull-right margen-top">
		<button class="btn " type="reset">Limpiar</button>
     	<button class="btn btn-primary" type="submit">Guardar</button>
 	</div>
 </form> 

<script src="<?php echo base_url("bootstrap/js/bibliotecas/form-ajax.js"); ?>"></script>