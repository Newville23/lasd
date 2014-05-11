	<div class="alertView  alert margen <?php echo $clase; ?>">
		<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
		<strong><?php echo $mensaje; ?></strong>
	</div>

	<script>
		$('.alertView').delay(2500).fadeOut(500);	
	</script>