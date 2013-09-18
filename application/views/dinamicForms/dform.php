<div class="container">
	
	<div class="page-header">
		<h2>Formulario dinamico</h2>
	</div>

	<h3 class="text-info"><?php echo $form_data['name']; ?></h3>

	<?php echo form_open('') ?>

	<div class="form-group">

	<?php foreach ($campo as $value): ?>

		<label class="control-label" for="<?php echo $value['id_']; ?>"><?php echo $value['label']; ?></label>
		<div class="controls">
			<input type="<?php echo $value['type']; ?>" name="<?php echo $value['name']; ?>" 
			class="<?php echo $value['class']; ?>"
			id="<?php echo $value['id_']; ?>"
			value="<?php echo $value['value']; ?>" 
			required="required" 
			placeholder="<?php echo $value['placeholder']; ?>" 
			autocomplete = "off">
			<br>
		</div>
	<?php endforeach; ?>

	</div>
	<div class="controls">
		<button class="btn btn-primary" type="submit"><i class=" icon-ok icon-white"></i> Crear </button>
	</div>
	</form>

	<?php echo anchor('formularios/', 'Ir al inicio'); ?>
</div>