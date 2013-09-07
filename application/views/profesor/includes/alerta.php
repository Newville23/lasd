<div class="alert alert-block  <?php echo $clase; ?>">
  <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
  <strong><?php echo $mensaje; ?></strong>
</div>


<script>
	var estado = <?php echo $estado; ?>

	if (estado == 1) {

		$('#myModalasd').delay(800).fadeOut("slow", function(){
			$('#myModalasd').modal('hide');
		});

		<?php if (isset($logro)): ?>
			var idnueva = <?php echo $logro['id']; ?>;
			idnueva = "<tr id='" + idnueva + "'>";
		
			$('#logros').append($(idnueva).load("<?php echo site_url('user/mostrarNota/' . $logro['id']) ?>"));
		<?php endif; ?>
	}
	else if (estado == 2) {

		$('#myModalasd').delay(800).fadeOut("slow", function(){
			$('#myModalasd').modal('hide');
		});

		<?php if (isset($logro)): ?>
			$("#<?php echo $logro['id']; ?>").load("<?php echo site_url('user/mostrarNota/' . $logro['id']) ?>");
		<?php endif; ?>
	}
</script>