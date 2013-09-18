<div class="tabbable">

	<ul class="nav nav-tabs">
	 	<li class="active"><a href="#info" data-toggle="tab">Infomacion Básica</a></li>
		<li class=""><a href="#editar" data-toggle="tab">Editar</a></li>
	</ul>

	<div class="tab-content">

		<div class="tab-pane active" id="info">

			<div class="img-thumbnail well" id="miniatura">
				<img class="img-rounded" data-src="holder.js/300x150" alt="300x150" style="width: 300px;" 
				src="<?php echo base_url('bootstrap/img/images/avatar.png'); ?>">
			</div>

			<div class="caption" id="perfil-caption">
				<h4><?php echo $datos['nombre'] . " " . $datos['apellido']; ?> </h4>

				<p><strong class="text-success">Curso: </strong> <?php echo $curso['nombre_curso'] . $curso['indice']; ?></p>

				<p><strong class="text-success">Edad: </strong> 
					<?php  echo $this->tiempo->calcularEdad($datos['fecha_nacimiento']);?> Años
					<span class="muted"><?php  echo $datos['fecha_nacimiento'];?></span></p>

				<p><strong class="text-success"><?php echo $datos['tipo_identificacion'] ?>: </strong> <?php  echo $datos['identificacion'];?></p>
				<p><strong class="text-success">Tipo de Sangre: </strong><?php echo $datos['tipo_sangre'] ?></p>

				<p><strong class="text-success">Email: </strong><?php echo $datos['email'] ?></p>
			</div>	

		</div>

		<div class="tab-pane" id="editar">
		</div>

	</div>
