	<div class="col-md-3 col-sm-3 col-md-clear">
		<strong class=""><?php echo $tipo_evaluacion; ?></strong>
	</div>


	<div class="col-md-6 col-sm-6"><?php echo $concepto; ?></div>
	<div class="col-md-2 col-sm-2">
		<?php echo form_open('user/actPonderacionNota/' . $id, array('class' => 'rangeAjax')); ?>
			<div class="form-group">
				<input id="range<?php echo $rand = rand(); ?>" type="number" class="text-center form-control input-lg clear-input" name="ponderacion" min="1" max="100" step="1" value="<?php echo $ponderacion; ?>">
			</div>
		</form>
	</div>

	<div class="col-md-1 col-sm-1">
		<a class="btn btn-info ActualizarCalificacion btn-block" href="<?php echo site_url('user/formLogroActualizar/' . $id); ?>" 
			type="button" data-placement="top" title="Editar"
			data-toggle="modal" data-target="#myModalasd"><i class="fa fa-pencil-square-o fa-lg"></i> <span class="visible-xs">Editar</span></a>
	</div>

	<script src="<?php echo base_url("bootstrap/js/bibliotecas/form-ajax.js"); ?>"></script>
	<script>
	    $('#AgregarCalificacion, .ActualizarCalificacion').on('click', function(event) {
            event.preventDefault();

	        var enlace = $(this).attr('href');
	        $('#modalNotas').html('<i class="fa fa-spinner text-muted fa-spin fa-4x col-md-offset-5"></i>');

	        $('#modalNotas').load(enlace);

    	});
	</script>
