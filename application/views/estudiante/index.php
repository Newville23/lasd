		<div class="container-fluid container-fluid2">
			<div class="row-fluid">

				<div class="span3 well well-white" id="perfil">
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
				</div>


				<div class="span5 well fontSize3" id="menu">

					<div class="row-fluid">
						<div class="span12 Matbar menu" id="apuntadorMaterias">
							<div class="notificacion">3</div>
							<div><i class="icon-book icon-large"></i> Materias</div>
						</div>
					</div>

					<div class="row-fluid">
						<div class="span12 Matbar menu" id="apuntadorProfes"><i class="icon-group"></i> Profesores</div>
					</div>

					<div class="row-fluid">
						<div class="span12 Matbar menu" id="apuntadorMensaje">
							<div class="notificacion">3</div>
							<div><i class="icon-envelope-alt icon-large"></i> Mensajes</div>
						</div>
					</div>

					<div class="row-fluid">
						<div class="span12 Matbar menu" id="apuntadorHorario"><i class="icon-th icon-large"></i> Horario</div>
					</div>

				</div>
				
				<div class="span6 well" id="materias">
					<div class="row-fluid">
						<?php foreach ($clase as $value): ?>
						<a class="Matbar2" href="<?php echo site_url('estudiante/materia/' . $value['numero']); ?>">
							<p><strong><?php echo $value['materia']; ?></strong><br>
								  <small><?php echo $value['profesor']; ?></small>
							</p>
						</a>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="span6 well" id="profes">
					<ul class="unstyled">
						<li>
							<?php foreach ($profesores as $value): ?>
							<div class="media well well-white">
						  		<a class="pull-left" href="#">
						    		<img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 50px; height: 50px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACZ0lEQVR4Xu2Y3YupURTGHyMSEimfUS4MIheSKDf+efksH0W4QKLIx43PZJxZq5xmOs2Z037PTBNr33gbe693r2c9e/3M1q3X6yseeOhEAHGAHAHpAQ/cAyFNUCggFBAKCAWEAg+sgGBQMCgYFAwKBh8YAvLPkGBQMCgYFAwKBgWDD6yAYFArBlerFfr9Pg6HA6xWKxKJBMxm8ztP1et1bDYbxONxeL3eT/32FTE/eqkmB5xOJxSLRTgcDvj9fvR6PX6mRG9jPB5jNBrhfD7/kwBfEfNvimsSYDqdotvtIpvNcvWv1yt0Ot3v9+12O1SrVYTDYZ53cwCJMhgMkEqlWLBarcYCZTIZzOdzpZif2uqDCZoEoCQomUAggMViAaPRiEgkArvdzmJQYpSgx+NBqVR654BGo4Htdgufz8cOSafTsNlsLIxqTBUR/osAoVAITqcTnU4HLy8vyOfzGA6HXE2q6n6//0MAqni5XMbxeMTz8zOCwSDv/yaASsxvF2AymfC5z+VysFgs/Ex/KxQKqFQqnPjtSJAw9EzJkmPoO5pzuVy4f0SjUd6/lpjfLgBVj5qg2+1mK5MDnp6eWBCiAiVNg5JtNpvcC2ieXq/n3kBzqfLtdhvJZBIul4sdoRLTYDCo5K/9PmC5XLJtaePUCGOxGH++HXTW3/YAcspsNuPjQc5ptVp4xTE3U5PJBJWYStm/LtLUA1Rf+pPWiQBafwn+pGqq7EUcIA6QKzG5EpMrMZXueS9rhAJCAaGAUEAocC8dXSUPoYBQQCggFBAKqHTPe1kjFBAKCAWEAkKBe+noKnk8PAV+AdqfV5+BvqppAAAAAElFTkSuQmCC">
						  		</a>
						  		<div class="media-body">
						    		<h4 class="media-heading"><?php echo $value['nombre']; ?></h4>
						    		<p>
						    			<?php echo $value['profesion']; ?>
						    			<span class="inforo"><i class="icon-envelope"></i><a href="#"> Mensaje</a></span>
						    		</p>

						  		</div>
							</div>
							<?php endforeach; ?>
						</li>	
					</ul>

				</div>

				<div class="span6 well" id="horario">
					<ul>
						<li>Nombre de las materias del horario</li>
						<li>Nombre de las materias del horario</li>
						<li>Nombre de las materias del horario</li>
						<li>Nombre de las materias del horario</li>
						<li>Nombre de las materias del horario</li>
						<li>Nombre de las materias del horario</li>
					</ul>
				</div>
			
			</div>
		</div>

		<!-- Modal del Perfil -->
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				  <h3 id="myModalLabel">Datos del Estudiante</h3>
			</div>
			<div class="modal-body">
				<h3>Lennin Alonso Suescun Devia</h3>
				<p class="muted">
					Info completa, resumen de cosas, en editar saldrá un formulario en model con cambio de imagen algunos datos etc,
				</p>
				
			</div>
			<div class="modal-footer">
				  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				  <button class="btn btn-primary">Editar</button>
			</div>
		</div>

