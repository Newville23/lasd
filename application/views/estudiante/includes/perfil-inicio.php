<div class="thumbnail" id="miniatura">
	<img data-src="holder.js/300x200" alt="300x200" style="width: 300px; height: 150px;" 
	src="<?php echo base_url('bootstrap/img/images/avatar.png'); ?>">
</div>

<div class="caption" id="perfil-caption">
	<h4><?php echo $datos['nombre'] . " " . $datos['apellido']; ?> </h4>
	<p><span class="badge">Curso: </span> <?php echo $curso['nombre']; ?></p>
	<p><span class="badge">Edad: </span> <?php  echo "?";?></p>
	<p><span class="badge"><?php echo $datos['tipo_identificacion'] ?>: </span> <?php  echo $datos['identificacion'];?></p>
</div>

<div class="caption" id="perfil-caption2">
	<h6 class="muted"><?php echo $datos['nombre'] . " " . $datos['apellido']; ?></h6>
</div>

<p>
	<a href="#myModal" role="button" class="btn btn-info span5" data-toggle="modal">Ver</a>
</p>