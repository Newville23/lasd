<div class="row text-center">

	<?php foreach ($clasesDelProfe as $value): ?>
	<a href="<?php echo site_url("profesor/clase/" . $value['numero']); ?>"
		class="Matbar fontSize3 <?php if ($value['numero'] == $numeroClase) echo "Matbar-selected"; ?>">
		<p><?php echo $value['nombre_curso']. 'º' . $value['indice']; ?>
			<br><span class="fontSize0"><?php echo $value['nombre'] ?></span class="fontSize0">
		</p>
	</a>
	<?php endforeach; ?>

</div>