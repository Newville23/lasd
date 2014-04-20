<div class="container">
	
	<div class="page-header">
		<h2>Editar formulario dinamico</h2>
	</div>
	
	<h3 class="text-primary"><?php echo $form_data['name']; ?></h3>

	<form action="" method="POST">

		<?php foreach ($campo as $value): ?>
			<div class="form-group">
			<div class="input-group input-group">

				<?php echo anchor('formularios/edit_cambiar/' . $value['id'], 'Cambiar', 'class="btn btn-default"'); ?>
				
				<input type="text" name="<?php echo $value['name']; ?>" 
				class="<?php echo $value['class']; ?>"
				id="<?php echo $value['id_']; ?>"
				value="<?php echo $value['value']; ?>" 
				required="required" 
				placeholder="<?php echo $value['placeholder']; ?>" 
				autocomplete = "off"
				readonly 
				size="15%" >
				<div class="btn-group">
					<?php echo anchor('formularios/edit_eliminar/' . $value['id'], 'Eliminar', 'class="btn btn-danger col-md-1"'); ?>
				</div>
			</div>
			</div>
		<?php endforeach; ?>

	</form>
	
	<p>
		<a href="<?php echo site_url('formularios/edit_add_campo/' . $id_form); ?>" class="btn btn-primary" >
			<i class=" fa fa-plus icon-white"></i> Agragar campo</a>
	</p>
	<?php echo anchor('formularios/', 'Atrás', 'class="btn btn-warning"'); ?>
</div>