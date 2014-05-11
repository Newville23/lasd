<div class="alertView alert alert-block  <?php echo $clase; ?>">
  <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
  <strong><?php echo $mensaje; ?></strong>
</div>


<script>
	var estado = <?php echo $estado; ?>
	//console.log(estado);
	//Crear evaluacion
	if (estado == 1) {

		$('#myModalasd').delay(800).fadeOut("slow", function(){
			$('#myModalasd').modal('hide');
		});

		$('.alertView').delay(800).fadeOut("slow");	

		<?php if (isset($logro)): ?>
			var idnueva = <?php echo $logro['id']; ?>;
			idnueva = "<div id='" + idnueva + "' class='col-md-12 col-sm-12 well-white margen-top-bottom'>";
		
			$('#logros').append($(idnueva).load("<?php echo site_url('user/mostrarNota/' . $logro['id']) ?>"));
		<?php endif; ?>
	}
	// Editar evaluacion
	else if (estado == 2) {

		$('#myModalasd').delay(800).fadeOut("slow", function(){
			$('#myModalasd').modal('hide');
		});

		$('.alertView').delay(800).fadeOut("slow");	

		<?php if (isset($logro)): ?>
			$("#<?php echo $logro['id']; ?>").load("<?php echo site_url('user/mostrarNota/' . $logro['id']) ?>");
		<?php endif; ?>
	}
</script>