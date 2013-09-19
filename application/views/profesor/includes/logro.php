	<td><a href="<?php echo site_url('user/formLogroActualizar/' . $id); ?>" class="btn btn-info ActualizarCalificacion" type="button" data-toggle="modal" data-target="#myModalasd">Editar</a></td>
						
	<td><?php echo $tipo_evaluacion; ?></td>
	<td><?php echo $concepto; ?></td>
	<td class="negrita" id="textNoForm<?php echo $rand = rand(); ?>"><?php echo $ponderacion; ?></td>
	<td>
		<?php echo form_open('user/actPonderacionNota/' . $id, array('class' => 'rangeAjax')); ?>
			<input id="range<?php echo $rand; ?>" type="range" class="range" name="ponderacion" min="1" max="100" step="1" value="<?php echo $ponderacion; ?>">
		</form>
	</td>

	<script src="<?php echo base_url("bootstrap/js/bibliotecas/form-ajax.js"); ?>"></script>
	<script>
	    $('#AgregarCalificacion, .ActualizarCalificacion').on('click', function() {
            
	        var enlace = $(this).attr('href');
	        $('#modalNotas').html('<i class="icon-spinner text-muted icon-spin icon-4x col-md-offset-5"></i>');

	        $('#modalNotas').load(enlace);

    	});
	</script>