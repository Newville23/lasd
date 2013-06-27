<div class="container-fluid">
	
	<div class="page-header">
		<h2>Formulario dinamico</h2>
	</div>

	<h3 class="text-info"><?php echo $form_data['name']; ?></h3>

	<?php echo form_open('') ?>

	<?php foreach ($campo as $value): ?>

	<input type="text" name="<?php echo $value['name']; ?>" 
	class="<?php echo $value['class']; ?>"
	id="<?php echo $value['id_']; ?>"
	value="<?php echo $value['value']; ?>" 
	required="required" 
	placeholder="<?php echo $value['placeholder']; ?>" 
	autocomplete = "off">
	<br>
	<?php endforeach; ?>


	<button class="btn btn-primary" type="submit"><i class=" icon-ok icon-white"></i> Crear </button>

	</form>

	<?php echo anchor('formularios/', 'Ir al inicio'); ?>
</div>