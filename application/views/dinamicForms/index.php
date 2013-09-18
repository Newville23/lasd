<div class="container">

<div class="page-header">
	<h2> Menú de formularios </h2>
</div>
	<?php echo anchor('formularios/sform', 'Crear DForm'); ?>

	<!-- <p><pre><?php //print_r($lista);?></pre></p> -->



	<?php foreach ($lista as $form): ?>

		<h4><?php echo 'Nombre: ' . $form['name'];?></h4>

		<p><?php echo "id: " . $form['id_name'];?><br>
		<?php echo "Clase: " . $form['class'];?></p>

		<p><?php echo anchor('formularios/dform/' . $form['id'], 'Ver DForm'); ?>
		<?php echo '| ' . anchor('formularios/edit/' . $form['id'], 'Editar formulario'); ?>
		<?php echo '| ' . anchor('formularios/eliminar/' . $form['id'], 'Eliminar formulario', 'class="text-error"'); ?></p>

	<?php endforeach; ?>
</div>