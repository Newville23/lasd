<div class="img-thumbnail" id="miniatura">
	<img data-src="holder.js/300x200" alt="300x200" style="width: 300px;" 
	src="<?php echo base_url('bootstrap/img/images/avatar.png'); ?>">
</div>

<div class="caption" id="perfil-caption">
	<h4><?php echo $datos['nombre'] . " " . $datos['apellido']; ?> </h4>
	<p><span class="badge">Curso: </span> <?php echo $curso['nombre_curso'] . $curso['indice']; ?></p>
	<p><span class="badge">Edad: </span> <?php  echo $this->tiempo->calcularEdad($datos['fecha_nacimiento']);?> Años</p>
	<p><span class="badge"><?php echo $datos['tipo_identificacion'] ?>: </span> <?php  echo $datos['identificacion'];?></p>
</div>

<div class="caption" id="perfil-caption2">
	<h6 class="text-muted"><?php echo $datos['nombre'] . " " . $datos['apellido']; ?></h6>
</div>

<p class="ModalInfo">
	<a 
		id="#<?php //echo $value['id_time']; ?>" 
		class="btn btn-info col-md-5"
		href=#"<?php //echo site_url('foro/foroModal/' . $value['Materia_id'] . '/' . $numeroClase . '/' . $value['id_time']); ?>" title="" 
		data-target="#myModal" data-toggle="modal">Ver</a>
</p>