<div class="alert alert-block  <?php echo $clase; ?>">
  <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
  <strong><?php echo $mensaje; ?></strong>
</div>

<script>
	var estado = <?php echo $estado; ?>

	if (estado == 1) {

		$('#myModalasd').delay(1000).fadeOut("slow", function(){
			$('#myModalasd').modal('hide');
		});
		
	}
	
</script>